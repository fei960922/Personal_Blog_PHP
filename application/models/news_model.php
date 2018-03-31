<?php
class News_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }
  public function get_news($id = FALSE){
    if ($id === FALSE)
    {
      $query = $this->db->get('news');
      return $query->result_array();
    }

    $query = $this->db->get_where('news', array('id' => $id));
    return $query->row_array();
  }
  public function set_news()
  {    
    $data = array(
      'id' => $this->input->post('id'),
      'title' => $this->input->post('title'),
      'text' => $this->input->post('text'),
      'date' => $this->input->post('date'),
      'pic' => $this->input->post('pic'),
      'category' => $this->input->post('category'),
    );
    return $this->db->insert('news', $data);
  }
}