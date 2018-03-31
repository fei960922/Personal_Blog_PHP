<h2>学子讲坛顺序报名系统</h2>

<?php 
	echo validation_errors(); 
	if ($error!='TRUE') echo '<p>'.$error.'</p>';
?>

<form action="<?php echo base_url("index.php/logistics/form") ?>" method="post" accept-charset="utf-8">
	<div class="user_login">
		<label for="title">学号</label> <br />
		<input type="input" name="number" /><br />
		<label for="title">密码</label> <br />
		<input type="input" name="password" /><br />		
	</div>
	<div class="forms">
		<label for="title">选择你希望进行学子讲坛的时间：</label> <br />	
		<?php 
			for ($i=2;$i<16;$i++){
				$ii = $i*7;
				$move = '+'.$ii.' day';
				$date = date('Y-m-d',strtotime($move,strtotime('2015-02-24')));
				$date_dis = '<h2>第'.$i.'周</h2><p>'.$date.'</p>' ;
				echo '<div class="col-sm-3" style="background-color:#EEEEEE;text-align:center;">'.$date_dis.'</div>';
			}
		?>
	</div>
  <input type="submit" name="submit" value="提交！" /> 

</form>