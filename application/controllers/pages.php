<?php

class Pages extends CI_Controller{
	public function jerry($page = 'home')
	{
		if ( ! file_exists(APPPATH.'/views/'.$page.'.php'))
		{
		// 页面不存在
		show_404();
		}
		$data['title'] = ucfirst($page); // 将title中的第一个字符大写
		$this->load->view($page, $data);
	}
	public function jerry2($page = 'news')
	{
		if ( ! file_exists(APPPATH.'/views/'.$page.'.php'))
		{
		// 页面不存在
		show_404();
		}
		$data['title'] = 'ucfirst($page)'; // 将title中的第一个字符大写
		$this->load->view($page, $data);
	}
}