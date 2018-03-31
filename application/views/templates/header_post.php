<!DOCTYPE html>
<html>
	<?php include 'head.php';?>
	<body <?php if (FONTS=='Youziku') echo 'class = "Microsoft_YaHei"'; ?>>
	<div id = "headingForPost">
		<?php include 'navigation.php';?>
	</div>
    <div class = "big_top" 
    <?php 
    	if (!(isset($pic))) $pic = 'btop_default'; 
    	echo "style = \"background-image:url(".base_url()."include/images/".$pic.".jpg);\">"; 
    	if (isset($title_full)) echo $title_full;
    	elseif (isset($title)) echo $title;
    	else echo "WARNING:Undefined Title!" 
    ?> 
		<br/>
	</div>
	<div class = "container">