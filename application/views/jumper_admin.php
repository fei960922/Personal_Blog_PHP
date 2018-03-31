<table class = "table-striped">
     <colgroup width="120"></colgroup>
     <colgroup width="480"></colgroup>
     <colgroup width="240"></colgroup>
     <colgroup width="240"></colgroup>
     <colgroup width="120"></colgroup>
<thead>
 <tr>
      <td>Short URL</td>
      <td>URL</td>
      <td>Text</td>
      <td>Time</td>
      <td>Status</td>
      <td>Setting</td>
 </tr>
</thead>
<tbody>
<?php foreach ($list as $i):?>
<tr>
	<td><?php echo $i['sname']; ?></td>
	<td><?php echo $i['url']; ?></td>
	<td><?php echo $i['text']; ?></td>
	<td><?php echo $i['date']; ?></td>
	<td><?php if($i['category']) echo 'Normal'; else echo 'Deleted'; ?></td>
	<td><a href="delete/<?php echo $i['sname'];if ($i['category']==0) echo '/1'; ?>">
  <?php if ($i['category']) echo 'Delete'; else echo 'Undo' ?></a></td>
</tr>
<?php endforeach ?>

</tbody>
</table> 