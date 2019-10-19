<?php include __DIR__.'/includes/header.php';?>



<section class="content-header">
	<h1>
		<span class="fa fa-lock"></span>
		Change Password
	</h1>
</section>

<section class="content">
		<div class="panel panel-default">
   <div  class="panel-body">

  <?php if($message != ''):?>
      <?= $message;?>
    <?php endif?>
  <div class="row">

    <div class="col-md-6">

      <div class="panel panel-default generator">
        <div class="panel-heading">
          <h5>&nbsp;</h5>
        </div>
        <div class="panel-body">
          <!-- CONTENT BODY HERE -->
          <div class="row">


        <form action="update_password" method="post">
          <div class="col-md-12">
            <div class="form-group">
              <label>Old Password:</label>
              <input type="password" class="form-control" name="txtOld" required />
            </div>
            
            <div class="form-group">
              <label>New Password:</label>
              <input type="password" class="form-control" name="txtNew" required />
            </div>
            
            <div class="form-group">
              <label>Confirm Password:</label>
              <input type="password" class="form-control" name="txtRenew" required />
            </div>
          </div>

            
                        <input type="hidden" value="<?php echo $_SESSION['SESS_USER_ID']; ?>" name="txtID" />
                        <input type="hidden" value="<?php echo $_SESSION['SESS_USER_NAME'];?>" name="txtUsername">

          <div class="col-md-12">
            
                        <input type="submit" value="Save" class="btn btn-success pull-right" name="btnSave" />
                        
          </div>
          </form>
              </div>
          <!-- CONTENT BODY HERE -->
        </div>
      </div>

    </div>
  </div>




   </div>
</div>

</section>
</div>




<?php include __DIR__.'/includes/footer.php';?>

</body>
</html>