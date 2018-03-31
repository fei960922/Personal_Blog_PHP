<?php

function sqr($value){return $value*$value;}
function sa($members){
    $T=100.0;
    $now_temp=10000;
    $n=count($members);
    $status=0;
    $best=1000000000;
    while ($T>0) {
      do{
        $t1=rand(0,$n-1);
        $t2=rand(0,$n-1);
      }while($t1==$t2);
      $now=sqr(abs($members[$t1]['chosen1']-$t1))+sqr(abs($members[$t2]['chosen1']-$t2));
      $new=sqr(abs($members[$t1]['chosen1']-$t2))+sqr(abs($members[$t2]['chosen1']-$t1));
      if($new<$now || lcg_value()<=exp(($now-$new)/$T)){
        $temp=$members[$t1];
        $members[$t1]=$members[$t2];
        $members[$t2]=$temp;
        $status+=$new-$now;
        if($status<$best){
          $res=$members;
        }
      }
      $T-=0.02;
    }
    return $res;
  }

class Logistics_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }
  
  public function verify(){
    $number = $this->input->post('number');
    if (!$number) return '';
    $query = $this->db->get_where('student',array('number' => $number));
    $temp = $query->row();
    if (!$temp) return 'User Not Found!';
    if ($this->input->post('password') != $temp->password)
      return 'Password is wrong!';
    return 'TRUE';
  }
  public function post_form($cata)
  {    
    $id = $this->db->query('SELECT `id` FROM student WHERE number = ?',array($this->input->post('number')))->row()->id;
    $temp = $this->db->query('SELECT * FROM logistic WHERE id = ? AND catagory = ?',array($id,$cata))->result();
    if ($temp) {
      $this->db->query('UPDATE logistic SET chosen1 = ? ,`date` = ? WHERE id = ?',array($this->input->post('times'),date('Y-m-d h:i:sa'),$id));
      return TRUE;
    } else {
      $data = array(
        'id' => $id,
        'catagory' => $cata,
        'chosen1' => $this->input->post('times'),
        'date' => date('Y-m-d h:i:sa'),
      );
      $this->db->insert('logistic', $data);
      return FALSE;
    }
  }
  public function output_form($cata = 1)
  {
    $query = $this->db->get_where('logistic',array('catagory' => $cata));
    $ready = sa($query->result_array());
    $temp = array();
    for ($i=0;$i<count($ready);$i++) {
      $query = $this->db->query('SELECT * FROM student WHERE id = ?',array($ready[$i]['id']))->row();
      array_push($temp,array('name' => '现在是乱码','number' => $query->number,'choose_date' => $ready[$i]['chosen1'],'real_date' => $i));      
    }
    return $temp;
  }
  public function analysis($data)
  {
    //input: $data = array(['number']->'2'(user want),......);
    //output: $data = array(['number']->'2'(after adjust),......);
    return $data;
  }
}