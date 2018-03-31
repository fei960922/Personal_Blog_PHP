<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$data['title'] = 'Index';
		$this->load->view('index.php',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */