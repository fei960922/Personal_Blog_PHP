<?php 
class Catchs extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('intro_model');
  }
	public function junxun($maxn = 338)
	{
		$baseurl = "http://junxun.dongyueweb.com/index.php/jxmd?jxlist_ban=";
		$url = $baseurl."1#";
		$contents = file_get_contents($url);
		echo substr($contents,0,strpos($contents,'<tbody>'));

		for ($i=1;$i<=$maxn;$i++){
			$url = $baseurl.$i."#";
			$contents = file_get_contents($url);
			echo substr($contents,strpos($contents,'<tbody>'),strpos($contents,'</tbody>')-strpos($contents,'<tbody>'));
		}
		
		$url = "http://junxun.dongyueweb.com/index.php/jxmd?jxlist_ban=1#";
		$contents = file_get_contents($url);		
		echo substr($contents,strpos($contents,'</tbody>'));
	}
	public function zhiyuan($maxn = 10) 
	{
		$baseurl = "http://zhiyuan.sjtu.edu.cn/articles/";
		echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>';
		for ($i=1;$i<=2000;$i++){
			$url = $baseurl.$i;
			$contents = file_get_contents($url);
			if ($contents) {
				echo $i.' ';
				$tep = substr($contents,strpos($contents,'<title>')+7,strpos($contents,'</title>')-strpos($contents,'<title>')-7);
				echo '<a href="'.$baseurl.$i.'">'.$tep.'<br />';
			}
		}
	}

	public function jaccount($maxn = 100) 
	{
		$url = "https://jaccount.sjtu.edu.cn/jaccount/captcha";
		for ($i=1;$i<=$maxn;$i++){
			$temp = rand();
			echo '<img src = "https://jaccount.sjtu.edu.cn/jaccount/captcha?' , $temp , '">';
		}
	}

	public function download_teacher()
	{
		echo '<html><body><meta charset="utf-8"></body>';
		$dom = new DOMDocument();
		$dom->loadHTMLFile('C:\Programming\PHPnow-1.5.6\main\temp\temp.html');
		$url = simplexml_import_dom($dom);
		$c = $url->xpath('//h3');
		$t = $url->xpath('//div');
		$image = $url->xpath('//img');
		$data = array();
		for ($i=0;$i<=34;$i++) { 

			$data['id'] = $i + 1000;
			$data['number'] = $i + 1000001000;

			$data['name'] = (string)$c[$i];
			$data['text'] = $t[$i]->asXML();
			$data['pic'] = (string)$image[$i]['src'];

			$data['grade'] = 9999;
			$data['password'] = $data['number'];
			$data['format'] = 1;
			$data['score'] = 1;

	        print_r($data);
	        $this->db->insert('student',$data);
	    }
	}

	public function mailtome()
	{
		for ($i=0;$i<=9;$i++) { 
			$to = "fei960922@163.com";
			$subject = "Test mail";
			$message = "Hello! This is a simple email message. The number is ".$i."!";
			$from = "someonelse@example.com";
			$headers = "From: $from";
			mail($to,$subject,$message,$headers);
			echo "Mail Sent.".$i;
		}
	}
}
