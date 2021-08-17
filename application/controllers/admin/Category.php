<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Category extends CI_Controller
{
  /**
   * Get All Data from this method.
   *
   * @return Response
   */
  public function __construct()
  {

    parent::__construct();
    $this->load->helper('common_helper');
    $this->load->model('category_model');
  }
  // This method will show category list page
  public function index()
  {
    $queryString = $this->input->get('q');
    $params['queryString'] = $queryString;
    $categories = $this->category_model->getCategory($params);
    $data['categories'] = $categories;
    $data['queryString'] = $queryString;

    $this->load->view('admin/category/list', $data);
  }
  // This methd will show create category page
  public function create()
  {

    $config['upload_path'] = './public/uploads/category';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['encrypt_name'] = true;
    // $config['max_size'] = '100';
    // $config['max_width'] = '1024';
    // $config['max_height'] = '768';

    $this->load->library('upload', $config);

    $this->load->model('category_model');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
    $this->form_validation->set_rules('name', 'Name', 'trim|required');
    if ($this->form_validation->run() == true) {
      //WILL Save Category

      if (!empty($_FILES['image']['name'])) {
        //Now user has given image so we will proceed
        if ($this->upload->do_upload('image')) {
          // file uploaded succesfully

          $data = $this->upload->data();
          resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb/' . $data['file_name'], 300, 270);
          //  echo '<pre>' ;print_r($data);die;
          $fromArray['image'] = $data['file_name'];
          $fromArray['name'] = $this->input->post('name');
          $fromArray['status'] = $this->input->post('status');
          $fromArray['created_at'] = date('Y-m-d H:i:s');
          $this->category_model->create($fromArray);
          $this->session->set_flashdata('success', 'Category Added Successfully');

          redirect(base_url() . 'admin/category/index');
        } else {
          //We got some error
          $error =  $this->upload->display_errors('<p class="invalid-feedback">', '</p>');
          $data['errorImage'] = $error;
          //  echo '<pre>'; print_r($data);die;
          $this->load->view('admin/category/create', $data);
        }
      } else {
        $fromArray['name'] = $this->input->post('name');
        $fromArray['status'] = $this->input->post('status');
        $fromArray['created_at'] = date('Y-m-d H:i:s');
        // echo '<pre>' ;print_r($fromArray);die;
        $this->category_model->create($fromArray);
        $this->session->set_flashdata('success', 'Category Added Successfully');

        redirect(base_url() . 'admin/category/index');
      }
    } else {
      //will Show error
      $this->load->view('admin/category/create');
    }
  }
  /**
   * Store Data from this method.
   *
   * @return Response
   */
  public function store()
  {
  }
  /**
   * Edit Data from this method.
   *
   * @return Response
   */

  //This method will shoe edit category page
  public function edit($id)
  {
    // echo $id;
    $res = $this->category_model->editCategory($id);
    if (empty($res)) {
      $this->session->set_flashdata('error', 'Record Not Found');
      redirect(base_url() . 'admin/category/index');
    }

    $config['upload_path'] = './public/uploads/category';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['encrypt_name'] = true;

    $this->load->library('upload', $config);

    $this->load->library('form_validation');
    $this->form_validation->set_rules('name', 'Name', 'trim|required');
    $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
    if ($this->form_validation->run() == true) {

      if (!empty($_FILES['image']['name'])) {
        //Now user has given image so we will proceed
        if ($this->upload->do_upload('image')) {
          // file uploaded succesfully
          $data = $this->upload->data();
          resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb/' . $data['file_name'], 300, 270);
          //  echo '<pre>' ;print_r($data);die;
          $fromArray['image'] = $data['file_name'];
          $fromArray['name'] = $this->input->post('name');
          $fromArray['status'] = $this->input->post('status');
          $fromNarray['removeimage'] = $this->input->post('removeimage');
          $fromArray['updated_by'] = date('Y-m-d H:i:s');
          $this->category_model->update($id,$fromArray,$fromNarray);
          $this->session->set_flashdata('success', 'Category updated Successfully');

          if(file_exists('./public/uploads/category/'.$res['image'] ) ) {
            unlink('./public/uploads/category/'.$res['image']);
          }         
          redirect(base_url() . 'admin/category/index');
        } else {
          //We got some error
          $error =  $this->upload->display_errors('<p class="invalid-feedback">', '</p>');
          $data['errorImage'] = $error;
          $data['category'] = $res;
          $this->load->view('admin/category/edit', $data);
        }
      } else {
        $fromArray['name'] = $this->input->post('name');
        $fromArray['status'] = $this->input->post('status');
        $fromArray['updated_by'] = date('Y-m-d H:i:s');
        // echo '<pre>' ;print_r($fromArray);die;
        $fromNarray = $this->input->post('removeimage');
        if(file_exists('./public/uploads/category/'.$res['image'] ) && $fromNarray == 1) {
          unlink('./public/uploads/category/'.$res['image']);
        }
        $this->category_model->update($id, $fromArray,$fromNarray);
        $this->session->set_flashdata('success', 'Category updated Successfully');

        redirect(base_url() . 'admin/category/index');
      }
    } else {
      $data['category'] = $res;
      // echo '<pre>' ;print_r($data);die;
      $this->load->view('admin/category/edit', $data);
    }
  }
  /**
   * Update Data from this method.
   *
   * @return Response
   */
  public function update($id)
  {
  }
  /**
   * Delete Data from this method.
   *
   * @return Response
   */
  //This method will show delet category page 
  public function delete($id)
  {
    $res = $this->category_model->editCategory($id);
    if (empty($res)) {
      $this->session->set_flashdata('error', 'Record Not Found');
      redirect(base_url() . 'admin/category/index');
    }

    if(file_exists('./public/uploads/category/'.$res['image'] )) {
      unlink('./public/uploads/category/'.$res['image']);
    }

    $this->category_model->deleteCategory($id);
    $this->session->set_flashdata('success','Data deleted successfully');
    redirect(base_url().'admin/category/index');
  }
}
