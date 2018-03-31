<?php
class News extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('news_model');
    $this->output->enable_profiler(TRUE);
  }

  public function index()
  {
    $data['news'] = $this->news_model->get_news();
    $data['title'] = 'News Center';

    $select = array();
    if(isset($_REQUEST["select"])) {
      foreach ($_POST['select'] as $i) {
        array_push($select,$i);}
    }
    if (count($select)==0) {$select = array("others","Academic","Sports","Entertain");}
    $data['select'] = $select;
    
    $this->load->view('templates/header',$data);
	  $this->load->view('news/index.php', $data);
    $this->load->view('templates/footer',$data);
  }

  public function view($id)
  {
    $data['news_item'] = $this->news_model->get_news($id);

    $data['title'] = $data['news_item']['title'];
    $data['text'] = $data['news_item']['text'];
    $this->load->view('templates/header',$data);
    $this->load->view('news/view.php', $data);
    $this->load->view('templates/footer',$data);

  }
  public function create()
  {
    $this->load->library('form_validation');
    
    $data['title'] = 'Create a news item';
    
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'text', 'required');
    
    if ($this->form_validation->run() === FALSE)
    {
      $this->load->view('templates/header',$data); 
      $this->load->view('news/create');
      $this->load->view('templates/footer',$data);
    }
    else
    {
      $this->news_model->set_news();
      $this->load->view('news/create_succ');
    }
  }
}