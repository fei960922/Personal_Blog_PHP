<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

function traverse_pic($path = '.') {
	$current_dir = opendir($path);    //opendir()返回一个目录句柄,失败返回false
	while(($file = readdir($current_dir)) !== false) {    //readdir()返回打开目录句柄中的一个条目
	$sub_dir = $path . DIRECTORY_SEPARATOR . $file;    //构建子目录路径
	if($file == '.' || $file == '..') continue;
	else if(is_dir($sub_dir)) {    //如果是目录,进行递归
             echo 'Directory ' . $file . ':<br>';
             //traverse($sub_dir);
        } else {
         	$allpath = $path . '/' . $file;
         	echo '<div class = "col-md-4" style = "background-image:url(../' . $allpath . ');height:300px;background-size:cover;"><h4><a href="'.$allpath.'">'. $file . '</a></h4></div>';
     	}
     }
 }
 function traverse($path = '.') {
	$current_dir = opendir($path);    //opendir()返回一个目录句柄,失败返回false
	while(($file = readdir($current_dir)) !== false) {    //readdir()返回打开目录句柄中的一个条目
	$sub_dir = $path . DIRECTORY_SEPARATOR . $file;    //构建子目录路径
	if($file == '.' || $file == '..') continue;
	else if(is_dir($sub_dir)) {    //如果是目录,进行递归
             echo 'Directory ' . $file . ':<br>';
             //traverse($sub_dir);
        } else {
         	$allpath = $path . '/' . $file;
         	echo '<div class = "col-md-6"><h4><a href="../../'.$allpath.'">'. $file . '</a></h4></div>';
     	}
     }
 }
class Ftp extends CI_Controller {
	public function index($path = '../ACM_Website_2014/images')
	{
		$data['title'] = 'Index';
		$data['path'] = $path;
		$this->load->view('ftp.php',$data);
	}
	public function zyppath($path = '../zyp_temp')
	{
		$data['title'] = 'Index';
		$data['path'] = $path;
		$this->load->view('ftp.php',$data);
	}
}
