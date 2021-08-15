<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Category_model extends CI_model {

   
    function __construct() {
        parent::__construct();
        
    }
    public function create($ArrayForm){
      $this->db->Insert('categories',$ArrayForm);
      
    }

    public function getCategory($params = []){
      if($params['queryString']!= ""){
        $this->db->like('name',$params['queryString']);
      }
      $result = $this->db->get('categories')->result_array();
      return $result;
    }

    public function editCategory($id){
      $this->db->where('id',$id);
      $result = $this->db->get('categories')->row_array();
      return $result;
    }

    public function update($id,$fromArray,$fromNarray){
      if($fromNarray == 1){
        $this->db->where('image',$fromArray['image']);
        $this->db->delete('categories');
      }
      $this->db->where('id',$id);
      $this->db->update('categories',$fromArray);
    }

    public function deleteCategory($id){
      $this->db->where('id',$id);
      $this->db->delete('categories');

    }
  }