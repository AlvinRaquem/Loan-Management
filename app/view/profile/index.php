<?php include __DIR__.'../../includes/header.php';?>



<section class="content-header">
	<h1>
		<span class="fa fa-users"></span>
	   Profile List
	</h1>

</section>

<section class="content">
		<div class="panel panel-default">
   <div  class="panel-body">

   <div class="table-responsive">
      <table class="table table-bordered table-condensed" id="profiletable">

          <thead>
              <tr>
               <th>Idno <i class="fa fa-sort"></i></th>
                <th>Name <i class="fa fa-sort"></i></th>
                <th>Gender <i class="fa fa-sort"></i></th>
                <th>SSS <i class="fa fa-sort"></i></th>
                <th>TIN <i class="fa fa-sort"></i></th>
                <th>Employer <i class="fa fa-sort"></i></th>
                <th>Business<i class="fa fa-sort"></i></th>
                <th>Loan record <i class="fa fa-sort"></i></th>
                <th></th>
              </tr>

          </thead>

          <tbody>
              <?php foreach($profiles as $profile):?>
                <tr>  
                  <td><a href="profile_details?refno=<?= urlencode($profile['idno']);?>"><?= $profile['idno'];?></a></td>
                  <td><strong><?= $profile['surname'].", ".$profile['firstname']." ".$profile['middlename'];?></strong></td>
                  <td><?= $profile['gender'];?></td>
                  <td><?= $profile['sssNo'];?></td>
                  <td><?= $profile['tinNo'];?></td>
                  <td><?= $profile['employerName'];?></td>
                  <td><?= $profile['selfBusinessName'];?></td>
                  <td><?= $profile['loancount'];?></td>
                  <td align="center"><a href='applyloan?idno=<?= $profile['idno'];?>'> Apply Loan</a></td>
                </tr>
              <?php endforeach?>

          </tbody>

      </table>
    </div>



   </div>
</div>

</section>
</div>




<?php include __DIR__.'../../includes/footer.php';?>

<script>
  $("#profiletable").dataTable({
      lengthMenu: [[100,200,500,-1],['100','200','500','ALL']],
  });
</script>

</body>
</html>