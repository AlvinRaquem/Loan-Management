<?php include __DIR__.'./includes/header.php';?>

<div id="mainContent">
<center><h1>ADD BLOG</h1></center>

<form class="form-horizontal" style="margin:0px 100px;background-color: #ccc;padding:20px" action="./addblog" method="POST">
	<label>TITLE:</label>
	<input type="text" name="title" class="form-control" required> 
	<label>BODY:</label>
	<textarea class="form-control" name="body" required></textarea>
	<input type="submit" name="submit" value="SAVE" class="btn-success" style="width: 25%;">
</form>
</div>

<?php include __DIR__.'./includes/footer.php';?>

</body>
</html>
