<h1>用户推荐系统</h1>
<h3>本次查询项目是：<?php echo '1' ?></h3>
<table class = "table-bordered">
	<caption>1</caption>
     <colgroup width="240"></colgroup>
     <colgroup width="240"></colgroup>
     <colgroup width="150"></colgroup>
     <colgroup width="150"></colgroup>
<thead>
  <tr>
      <td>姓名</td>
      <td>学号</td>
      <td>选择时间</td>
      <td>实际时间</td>
  </tr>
</thead>
<tbody>
<?php foreach ($form as $f): ?>
<tr>
	<td><?php echo $f['name']; ?></td>
	<td><?php echo $f['number']; ?></td>
	<td><?php echo $f['choose_date']; ?></td>
  <td><?php echo $f['real_date']; ?></td>
</tr>
<?php endforeach ?>

</tbody>
</table> 
