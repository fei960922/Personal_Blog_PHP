<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Logistics extends CI_Controller {

	public function __construct()
  	{
    	parent::__construct();
    	$this->load->model('logistics_model');
  	}
	public function index()
	{
		$data['title'] = 'ACM Logistics System';
    	$this->load->view('templates/header',$data);
	  	$this->load->view('logistics/index.php');
    	$this->load->view('templates/footer');
	}
	public function form()
	{
		$this->load->library('form_validation');
    	$this->form_validation->set_rules('number', 'number', 'required');
    	$this->form_validation->set_rules('password', 'password', 'required');
    	$this->form_validation->set_rules('times', 'times', 'required');

		$data['title'] = 'ACM Logistics System';
		$data['error'] = 'TRUE';

	    if ($this->form_validation->run() && $this->logistics_model->verify() == 'TRUE') {
	    	$data['status'] = $this->logistics_model->post_form(1);
	    	$this->load->view('templates/header',$data);
	      	$this->load->view('logistics/form_succ.php');
	    } else {
	    	$data['error'] = $this->logistics_model->verify();
	    	$this->load->view('templates/header',$data);
		  	$this->load->view('logistics/form.php');
	    }
	    $this->load->view('templates/footer');
	}
	public function manage()
	{
		$data['title'] = 'ACM Logistics System';
		$data['form'] = $this->logistics_model->output_form(1);
    	$this->load->view('templates/header',$data);
	  	$this->load->view('logistics/manage.php');
    	$this->load->view('templates/footer');
	}
}
