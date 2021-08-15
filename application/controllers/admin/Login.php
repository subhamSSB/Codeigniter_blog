<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
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
    $this->load->library('form_validation');
    $this->load->model('admin_model','model');
  }
  public function index()
  {

    $this->load->view('admin/login');
  }
  public function authenticate(){
    $this->form_validation->set_rules('userName', 'username','trim|required');
    $this->form_validation->set_rules('password', 'password','trim|required');

    if($this->form_validation->run() == true){
      //success
     $post = $this->input->post('userName');
     $admin = $this->model->getByUsername($post);
    // print_r($admin);
    if(!empty($admin)){
      $password = $this->input->post('password');
      if(password_verify($password,$admin['password']) == true){
        $adminArray['admin_id'] = $admin['id'];
        $adminArray['username'] = $admin['username'];
        $this->session->set_userdata('admin',$adminArray);
      //  echo '<pre>'; print_r($aa);die;
        redirect(base_url().'admin/admin_controller/index');
      }else{
        $this->session->set_flashdata('msg','password invalid');
      redirect(base_url().'admin/login/index');
      }
    }else{
      $this->session->set_flashdata('msg','Either username or password invalid');
      redirect(base_url().'admin/login/index');
    }
    }else{
      //error
      $this->load->view('admin/login');
    }
  }

  function logout(){
    $this->session->unset_userdata('admin');
    redirect(base_url().'admin/login/index');
  }
}
