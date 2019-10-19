<?php include __DIR__.'../../includes/header.php';?>



<section class="content-header">
	<h1>
		<span class="fa fa-edit"></span>
	   Manage Requirement(s)
    <a href="javascript:void(0)" id="showaddModal"><button class="pull-right btn btn-primary"><span class="fa fa-plus"></span> Create</button></a>
	</h1>

</section>

<section class="content">
		<div class="panel panel-default">
   <div  class="panel-body">

      <table class="table table-bordered table-condensed" id="tableData">

          <thead>
              <tr>
                <th># <i class="fa fa-sort"></i></th>
                <th>Description <i class="fa fa-sort"></i></th>
                <th></th>
                <th></th>
              </tr>

          </thead>

          <tbody>
            <?php $x=1;?>
              <?php foreach($list as $requirement):?>
              <tr>
                <td><?= $x++;?></td>
                <td><?= $requirement['requirement'];?></td>
                <td><a href="javascript:void(0)" class="editdata" data-idno="<?= $requirement["idno"];?>" data-requirement="<?= $requirement["requirement"];?>">Edit</a></td>
                <td><a href="javascript:void(0)" class="deletedata" data-idno="<?= $requirement["idno"];?>">Delete</a></td>
              </tr>
              <?php endforeach?>


          </tbody>

      </table>




   </div>
</div>

</section>
</div>

<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Requirement</h4>
      </div>
      <div class="modal-body">
              <form class="form-horizontal">
       
                <div class="form-group">
                  <label class="col-lg-2 control-label">Description</label>
                  <div class="col-lg-10">
                    <input type="text" id="txtRequirement" name="txtRequirement" class="form-control" required>
                    <span class="errormessage" id="requirementerror"></span>
                  </div>
                </div>

              </form>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" id="saveData">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Requirement</h4>
      </div>
      <div class="modal-body">
              <form class="form-horizontal">
       
                <div class="form-group">
                  <label class="col-lg-2 control-label">Description</label>
                  <div class="col-lg-10">
                    <span id="editidno" class="hidden"></span>
                    <input type="text" id="edit_txtRequirement" name="edit_txtRequirement" class="form-control" required>
                    <span class="errormessage" id="edit_requirementerror"></span>
                  </div>
                </div>

              </form>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" id="updateData">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




<?php include __DIR__.'../../includes/footer.php';?>

<script>
  $("#tableData").dataTable();

  $(document).on('click','#showaddModal',function(){
    $('#requirementerror').text("");
    $("#txtRequirement").val("");
    $("#addModal").modal('show');
  })

  $(document).on('click','#saveData',function(){
      let requirement = $("#txtRequirement").val();

      if(requirement ==""){
        $('#requirementerror').text("This field is required");
      }else{
        $.ajax({
          url: 'addRequirement',
          type: 'POST',
          data: '&requirement='+requirement,
          success:function(res){
              if(res == 1){
                alert('Successful');
              }else{
                alert('Something Went Wrong!');
              }

              window.location.href = window.location.href;
          }
        })
      }
  })

  $(document).on('click','.deletedata',function(){
      let idno = $(this).data('idno');

      if(confirm("Are you sure you want to remove this?")){
        $.ajax({
          url: 'removeRequirement',
          type: 'POST',
          data: '&idno='+idno,
          success:function(res){
              if(res == 1){
                alert('Successful');
              }else{
                alert('Something Went Wrong!');
              }

              window.location.href = window.location.href;
          }
        })
      }
  })


    $(document).on('click','.editdata',function(){
      let idno = $(this).data('idno');
      let requirement = $(this).data('requirement');
      $('#edit_requirementerror').text("");
      $("#edit_txtRequirement").val(requirement);
      $("#editidno").text(idno);
      $('#editModal').modal('show');

  
  })

    $(document).on('click','#updateData',function(){
      let idno = $('#editidno').text();
      let requirement = $("#edit_txtRequirement").val();

      $.ajax({
          url: 'updateRequirement',
          type: 'POST',
          data: '&idno='+idno+'&requirement='+requirement,
          success:function(res){
              if(res == 1){
                alert('Successful');
              }else{
                alert('Something Went Wrong!');
              }

              window.location.href = window.location.href;
          }
        })
      

    })

</script>

</body>
</html>