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
   

  }
  // This method will show article listing  page
  public function index()
  {
   $this->load->view('admin/article/list_article');
  }
  // This method will show article create page
  public function create()
  {
    $this->load->view('admin/article/create_article.php');
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
