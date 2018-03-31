<?php
class FTP extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {

  }
  public function sjtu()
  {
  	function listfile($conn, $filelist) {
		$files = array();
		$str = "";
		$br = "<br>";
		$i = 0; $j = 0;
	 	foreach($filelist as $file) {
	 		if(ftp_size($conn, $file) == -1){
				echo "<p>".str_repeat("___", (substr_count($file, "/") ) * 2)."【".basename($file)."】".'</p>';
				 $str .= $file.$br;
				 array_push($files, $file);
				 $flist = ftp_nlist($conn, $file);
				 listfile($conn, $flist);
			 } else {
			 	echo "<p>".str_repeat("___", (substr_count($file, "/") ) * 2).basename($file).'</p>';
			 }
	 	}
	}

  	$conn = ftp_connect("public.sjtu.edu.cn") or die("ERROR");
  	ftp_login($conn,"fei960922","fei960922public");

	echo '<html><body><meta charset="utf-8"></body>';

	$filelist = ftp_nlist($conn, "/");
	listfile($conn,$filelist);

  	ftp_close($conn);
  }
}