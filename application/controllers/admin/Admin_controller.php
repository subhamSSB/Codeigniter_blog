<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_controller extends CI_Controller
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
    $admin = $this->session->userdata('admin');
    if(empty($admin)){
      // echo '<pre>';print_r($admin);die;
      $this->session->set_flashdata('msg','your session Expired');
      redirect(base_url().'admin/login/index');
    }

  }
  public function index()
  {
    $admin = $this->session->userdata('admin');
    $this->load->view('admin/dashboard');
  }
  public function create()
  {
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
