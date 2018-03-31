<?php
class Intro_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }
  public function get_stu($grade = FALSE){
    if ($grade === FALSE)
     	$query = $this->db->query('SELECT * FROM student WHERE name = "main"');
  	else 
      $query = $this->db->get_where('student',array('grade' => $grade));
    return $query->result_array();
  }
  public function set_stu()
  {
    $data = array(
      'id' => $this->input->post('id'),
      'name' => $this->input->post('name'),
      'text' => $this->input->post('text'),
      'pic' => $this->input->post('pic'),
      'grade' => $this->input->post('grade'),
    );
    return $this->db->insert('student', $data);
  }
}