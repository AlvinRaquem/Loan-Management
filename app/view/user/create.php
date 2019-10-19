<?php include __DIR__.'../../includes/header.php';?>



<section class="content-header">
	<h1>
		<span class="fa fa-user"></span>
		Create User
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

   		     
          
            <form class="form-horizontal" method="post" action="adduser">
       
                <div class="form-group">
                  <label class="col-lg-2 control-label">Name</label>
                  <div class="col-lg-10">
                    <input type="text" name="txtName" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Email Add</label>
                  <div class="col-lg-10">
                    <input type="text" name="txtEmail"  class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Level</label>
                  <div class="col-lg-10">
                    <select name="txtLevel" class="form-control">
                    <!--     <option>User</option> -->
                        <option>Admin</option>
                      <!--   <option>Supervisor</option> -->
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-2 control-label">Username</label>
                  <div class="col-lg-10">
                    <input type="text" name="txtUser"  class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Password</label>
                  <div class="col-lg-10">
                     <input type="password" name="txtpass"  class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Confirm Password</label>
                  <div class="col-lg-10">
                    <input type="password" name="txtpass2"  class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <!--<button type="submit" class="btn btn-primary" name="btnUpdate">Update</button>-->
                    <input type="submit" name="btnSave" value="Save" class="btn btn-success" />
                    <a href="manage_user" class="btn btn-danger">close</a>
                  </div>
                </div>
      
            </form>
            
            
            




   </div>
</div>

</section>
</div>




<?php include __DIR__.'../../includes/footer.php';?>

</body>
</html>