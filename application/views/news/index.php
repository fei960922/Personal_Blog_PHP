<div class="container">
	<ul class="timeline">
		<li>
			<div class="timeline-panel" style = "height:150px">
			<h1 style="padding:20px;text-align:center">新闻中心</h1>
			<form name="input" action="news" method="post" style="padding:30px;font-size:20px;display:inline;">
				类别筛选：
				<input type="checkbox" name="select[]" value = "others"/>others
				<input type="checkbox" name="select[]" value = "Academic"/>Academic
				<input type="checkbox" name="select[]" value = "Sports"/>Sports
				<input type="checkbox" name="select[]" value = "Entertain"/>Entertain
				<input type="submit" class="btn btn_new" value = "筛选" />
			</form>
			</div>
		</li>
	<?php 
		foreach ($news as $news_item): 
			if (in_array($news_item['category'],$select)):
	?>
		<li>
			<div class="timeline-date"><?php echo $news_item['date'] ?></div>
			<a><div class="timeline-badge primary"><?php echo $news_item['id'] ?></div></a>
			<div class="timeline-panel">
				<div class = "col-md-6 timeline-pic" style="background-image:url(<?php echo base_url(),"include/images/news/",$news_item['pic'] ?>)"></div>
				<h2><a><?php echo $news_item['title'] ?></a></h2>
				<div class="col-md-6 timeline-body">
			  		<?php echo $news_item['text'] ?>
				</div>
				<div class="timeline-footer"><a class="pull-left" href="<?php echo site_url(),"/news/view/",$news_item['id'] ?>">点击查看更多</a></div>
			</div>
		</li>
	<?php endif; 
		endforeach ?>
	</ul>
</div>