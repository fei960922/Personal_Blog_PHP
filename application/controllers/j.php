<?php
class J extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('jumper_model');
  }
  public function index()
  {
  	$data['title'] = 'Jumper System';
    $data['title_full'] = '跳转服务<br/>Powered by Jerry Xu';
    $this->load->view('templates/header_post',$data);
    if ($this->jumper_model->create())
		echo 'Succ!';  	
	else
		$this->load->view('jumper.php');
	$this->load->view('templates/footer');
  }
  public function n($name)
  {
  	$data = $this->jumper_model->geturl($name);
    $data['title'] = 'Jumper System';
    echo '<html><head><title>Jumping</title></head><body><script language="javascript">;';
    if ($data['text']) echo 'alert("'.$data['text'].'");';
    echo 'document.location = "'.$data['url'].'";</script></body></html>';
  }
  public function delete($name,$re = 0)
  {
  	$this->jumper_model->delete($name,$re);
    echo 'Delete/Undo Succ!';
  }
  public function admin()
  {
  	$data['list'] = $this->jumper_model->geturl();
  	$data['title'] = 'Jumper System';
    $data['title_full'] = '跳转服务<br/>Powered by Jerry Xu';
    $this->load->view('templates/header_post',$data);
    $this->load->view('jumper_admin.php');
	$this->load->view('templates/footer');  	
  }
}