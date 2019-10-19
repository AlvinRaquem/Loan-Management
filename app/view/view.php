<?php include __DIR__.'./includes/header.php';?>

<div id="mainContent">
<center><h1><?= $blog[0]['title'];?></h1>
<p><?= $blog[0]['body'];?></p>
<p><?= $blog[0]['datecreated'];?></p>
</center>
</div>

<?php include __DIR__.'./includes/footer.php';?>

</body>
</html>