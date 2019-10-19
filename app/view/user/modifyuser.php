<?php include __DIR__.'../../includes/header.php';?>



<section class="content-header">
  <h1>
    <span class="fa fa-users"></span>
    <a href="manage_user">Modify User</a>
  </h1>
</section>

<section class="content">
    <div class="panel panel-default">
   <div  class="panel-body">

    <?php

    if(isset($_SESSION['message'])){
      echo $_SESSION['message'];
    }
    $_SESSION['message'] = '';

    ?>
         <form class="form-horizontal" method="post" action="update_password">
  <fieldset>
    <legend>Change Password</legend>
    <input type="hidden" value="<?php echo $user['IDno']; ?>" name="txtID" />
    <div class="form-group">
      <label class="col-lg-2 control-label">Username</label>
      <div class="col-lg-10">
        <input type="text" name="txtUsername" class="form-control" value="<?php echo $user['user_name']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">New Password</label>
      <div class="col-lg-10">
        <input type="password" name="txtNew" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Confirm Password</label>
      <div class="col-lg-10">
        <input type="password" name="txtRenew" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <input type="submit" value="Update" name="btnPass" class="btn btn-primary" />
      </div>
    </div>
  </fieldset>
  
  
</form>
   
<form class="form-horizontal" method="post" action="udpateUserinfo">
  <fieldset>
    <legend>USER ID : <strong><?php echo $user['IDno']; ?></strong></legend>
    <input type="hidden" value="<?php echo $user['IDno']; ?>" name="txtid" />
    <div class="form-group">
      <label class="col-lg-2 control-label">Name</label>
      <div class="col-lg-10">
        <input type="text" name="txtName" value="<?php echo $user['full_name']; ?>" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Email Add</label>
      <div class="col-lg-10">
        <input type="text" name="txtEmail" value="<?php echo $user['email_add']; ?>" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Level</label>
      <div class="col-lg-10">
        <select name="txtLevel" class="form-control">
          <option selected><?php echo $user['userlevel']; ?></option>
        <!--   <option>User</option> -->
            <option>Admin</option>
            <!-- <option>SuperAdmin</option> -->
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <!--<button type="submit" class="btn btn-primary" name="btnUpdate">Update</button>-->
        <input type="submit" name="btnUpdate" value="Update" class="btn btn-primary" />
      </div>
    </div>
  </fieldset>
</form>
<hr>


<form method="post" action="removeUser">
<div class="modal-footer">
    <input type="hidden" value="<?php echo $user['IDno']; ?>" name="txtid" />
    <a href="manage_user" class="btn btn-danger pull-left">BACK</a>
    <input type="submit" class="btn btn-danger" name="btnRemove" value="Remove Account" />
</div>
</form>

   </div>
</div>

</section>
</div>




<?php include __DIR__.'../../includes/footer.php';?>

</body>
</html>