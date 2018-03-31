<h2>Create a news item</h2>

<?php echo validation_errors(); ?>

<form action="http://localhost/Personal_Blog_PHP/index.php/news/create" method="post" accept-charset="utf-8">
	<label for="title">Title</label> <br />
	<input type="input" name="title" /><br />
	<label for="title">date</label> <br />
	<input type="input" name="date" /><br />
	<label for="title">id</label> <br />
	<input type="input" name="id" /><br />
	<label for="title">category</label> <br />
	<input type="radio" name="category" value="others"/>Others<br />
	<input type="radio" name="category" value="Academic"/>Academic<br />
	<input type="radio" name="category" value="Sports"/>Sports<br />
	<input type="radio" name="category" value="Entertain"/>Entertain<br />
	<label for="text">Text</label>
	<textarea name="text"></textarea><br />
	<label for="title">picture</label> <br />
	<input type="file" name="pic" /><br />
  
  <input type="submit" name="submit" value="Create news item" /> 

</form>