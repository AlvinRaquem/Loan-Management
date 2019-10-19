<?php include __DIR__.'../../includes/header.php';?>



<section class="content-header">
	<h1>
		<span class="fa fa-users"></span>
	   Manage User(s)
    <a href="new_user"><button class="pull-right btn btn-primary"><span class="fa fa-plus"></span> Create</button></a>
	</h1>

</section>

<section class="content">
		<div class="panel panel-default">
   <div  class="panel-body">

      <table class="table table-bordered table-condensed" id="usertable">

          <thead>
              <tr>
                <th>Name <i class="fa fa-sort"></i></th>
                <th>Username <i class="fa fa-sort"></i></th>
                <th>Level <i class="fa fa-sort"></i></th>
                <th></th>
              </tr>

          </thead>

          <tbody>
              <?php foreach($users as $user):?>
                <tr>  
                  <td><?= $user['full_name'];?></td>
                  <td><?= $user['user_name'];?></td>
                  <td><?= $user['userlevel'];?></td>
                  <td align="center"><a href='modify_user?idno=<?= $user['IDno'];?>'><span class="glyphicon glyphicon-pencil"></span></a></td>
                </tr>
              <?php endforeach?>

          </tbody>

      </table>




   </div>
</div>

</section>
</div>




<?php include __DIR__.'../../includes/footer.php';?>

<script>
  $("#usertable").dataTable();
</script>

</body>
</html>