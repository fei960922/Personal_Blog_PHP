<div class="col-md-2 content">
	<h3>名录</h3>
	<?php foreach ($student as $stu_item) {
		echo '<h5><a href="#',$stu_item['name'],'">',$stu_item['name'],'</a></h5>';
	}?>
</div>
<div class="col-md-10 padding_0">
<?php 
	foreach ($student as $s) {
		echo '<div class="student_in';
		switch ($s['format']%10){
			case 1: echo ' student_l';break;
			case 2: echo ' student_r';break;
			case 3: echo ' student_l';break;
			case 4: echo ' student_r';break;
			case 5:	echo ' student_b';break;
			default: echo ' student_l';break;
		}
		switch ((int)($s['format']/10)){
			case 0:	echo ' student_black';break;
			case 1:	echo ' student_white';break;
			case 2:	echo ' student_grey'; break;
		}
		echo '" style = "background-image:url(';
		if ($s['format']%10==3 || $s['format']%10==4){
			$temp = $s['id']%4;
			echo image_url('students/general_'.$temp.'.jpg');
		} else echo image_url('students/'.$s['pic']);
		echo ')"><a id = "'.$s['name'].'"><h1>'.$s['name'];

		if (TRUE) switch ($s['score']){
			case 0: echo '<button type="button" class="btn btn-default" style = "float:right;margin:10px;">没有缺少图片/文字</button>';break;
			case 1: echo '<button type="button" class="btn btn-danger" style = "float:right;margin:10px;">非常烂，强烈要求更换图片！</button>';break;
			case 2: echo '<button type="button" class="btn btn-warning" style = "float:right;margin:10px;">起码不差，建议更换图片/私戳意见！</button>';break;
			case 3: echo '<button type="button" class="btn btn-success" style = "float:right;margin:10px;">很不错！如果不想征婚就不用改了~</button>';break;
			case 4: echo '<button type="button" class="btn btn-primary" style = "float:right;margin:10px;">完美的图文搭配！</button>';break;
			
		}

		echo '</h1></a><div>'.$s['text'].'</div>';
		if ($s['format']%10==3 || $s['format']%10==4)
			echo '<img src="'.image_url('students/'.$s['pic']).'">';
		echo '</div>';
	}
 ?>

