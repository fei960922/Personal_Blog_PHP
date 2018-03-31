<?php
class Jumper_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }
  public function geturl($name = FALSE){
    if ($name === FALSE)
    {
      $query = $this->db->get('jumper');
      return $query->result_array();
    }
    else {
   	  $query = $this->db->get_where('jumper', array('sname' => $name,'category' => 1));
      return $query->row_array();
    }
  }
  public function create(){
  	if (!($this->input->post('url'))) return FALSE;
    if (!($this->input->post('name'))) return FALSE;
    $temp = $this->db->query('SELECT COUNT(sname) FROM jumper WHERE sname = ? ',array($this->input->post('name')))->row_array();
    if($temp['COUNT(sname)']) return FALSE;
  	$data = array(
      'sname' => $this->input->post('name'),
      'url' => $this->input->post('url'),
      'date' => date('Y-m-d h:i:sa'),
      'text' => $this->input->post('text'),
      'category' => 1,
    );
  	return $this->db->insert('jumper', $data);
  }
  public function delete($name,$re = 0){
    if ($re) 
  	 $this->db->query('UPDATE jumper SET category = 1 WHERE sname = ? ',array($name));
    else 
     $this->db->query('UPDATE jumper SET category = 0 WHERE sname = ? ',array($name)); 
  }
}