<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Article extends CI_Controller
{
  /**
   * Get All Data from this method.
   *
   * @return Response
   */
  public function __construct()
  {
    //load database in autoload libraries 
    parent::__construct();
    $this->load->model('category_model');
    $this->load->library('form_validation');

  }
  // This method will show article listing  page
  public function index()
  {

    
     $this->load->view('admin/article/list_article');
  }
  // This method will show article create page
  public function create()
  {
    $categories = $this->category_model->getCategory(12);
    $data['categories'] = $categories;

    $this->form_validation->set_rules('category_id','Category','trim|required');
    $this->form_validation->set_rules('title','Title','trim|required');
    $this->form_validation->set_rules('author','Author','trim|required');

    if($this->form_validation->run() == true){
      //Form validated successfully

    }else{
      //form not validated
    $this->load->view('admin/article/create_article.php',$data);

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
   * Edit Data from this method & will show edit page.
   *
   * @return Response
   */
  public function edit($id)
  {
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
  public function delete($id)
  {
  }
}
