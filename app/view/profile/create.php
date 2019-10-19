
<?php include __DIR__.'../../includes/header.php';?>



<section class="content-header">
  <h1>
    <span class="fa fa-home"></span>
     New Profile
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

          <form role="form" method="POST" action="newProfile" enctype="multipart/form-data">
  <div class="row">
      <div class="col col-md-12">
 
                        <div class="row">
                              <div class="form-group">
                                <div class="col col-md-12">
                                  <div class="page-header">
                            <h3 class="text-primary"><i class="fa fa-edit"></i> INFORMATION</h3>  <!-- Information -->
                          </div>
                                </div>
                              </div>
                              <div class="form-group">
                                  <div class="col col-md-12">
                                  
                                    <img src="public/image/user.png" id="imgpreview" style="height: 200px;width: 200px">
                                    <input type="file" name="imgfile" accept=".png,.jpg" onchange="changePreview(this)">
                                  </div>

                              </div>
                                <div class="form-group">
                                  <div class="col col-md-4">
                                    <label>First Name</label>
                                    <input type="text" name="firstname" class="form-control" required>
                                  </div>
                                  <div class="col col-md-4">
                                    <label>Middle Name</label>
                                    <input type="text" name="middlename" class="form-control" required>
                                  </div>
                                  <div class="col col-md-4">
                                    <label>Surame</label>
                                    <input type="text" name="surname" class="form-control" required>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col col-md-12">
                                    <label>Permanent Address</label>
                                    <input type="text" name="permanent_address"  class="form-control">
                                  </div>  
                                </div>
                                <div class="form-group">
                                  <div class="col col-md-4">
                                    <label>Ownership</label>
                                    <select class="form-control" name="permanent_ownership">
                                      <option>Owned</option>
                                      <option>Mortgaged with</option>
                                      <option>Rented</option>
                                      <option>Free use</option>
                                    </select> 
                                  </div>  
                                  <div class="col col-md-8">
                                    <label>Length of Stay (in years)</label>
                                    <input type="text" name="permanent_ownership_years" class="form-control">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col col-md-4">
                                    <label>Provincial Address</label>
                                    <input type="text" name="provincial_address" class="form-control">
                                  </div>
                                  <div class="col col-md-4">
                                    <label>Ownership</label>
                                    <select class="form-control" name="provincial_ownership">
                                      <option>Owned</option>
                                      <option>Mortgaged with</option>
                                      <option>Rented</option>
                                      <option>Free use</option>
                                    </select> 
                                  </div>
                                  <div class="col col-md-4">
                                    <label>Length of Stay (in years)</label>
                                    <input type="text" name="provincial_ownership_years" class="form-control">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col col-md-4">
                                    <label>Home Landline</label>
                                    <input type="text" name="home_landline" class="form-control">
                                  </div>
                                  <div class="col col-md-4">
                                    <label>Mobile Nos</label>
                                    <input type="text" name="mobile_nos" class="form-control">
                                  </div>
                                  <div class="col col-md-4">
                                    <label>Email Address</label>
                                    <input type="text" name="email_address" class="form-control">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col col-md-4">
                                    <label>Date of Birth</label>
                                    <input type="Date" name="date_birth" class="form-control">
                                  </div>
                                  <div class="col col-md-4">
                                    <label>Place of Birth</label>
                                    <input type="text" name="place_birth" class="form-control"
                                  </div>
                                </div>
                                  <div class="col col-md-2">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender">
                                      <option>Male</option>
                                      <option>Female</option>
                                    </select>
                                  </div>
                                  <div class="col col-md-2">
                                    <label>Nationality</label>
                                    <input type="text" name="nationality" class="form-control">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col col-md-4">
                                    <label>Educational Attainment</label>
                                    <select class="form-control" name="educational">
                                      <option>Elementary</option>
                                      <option>High School</option>
                                      <option>College Undergraduate</option>
                                      <option>College Graduate</option>
                                      <option>vocational</option>
                                      <option>post graduate</option>
                                      <option>doctorate</option>
                                      <option>Other</option>
                                    </select>
                                    <input type="text" name="educational_other" class="form-control">
                                  </div>
                                  <div class="col col-md-2">
                                    <label>Residency</label>
                                    <select class="form-control" name="residency">
                                      <option>Resident/Citizen</option>
                                      <option>Resident Alien</option>
                                      <option>Non-resident Alien</option>
                                    </select>
                                  </div>
                                  <div class="col col-md-2">
                                    <label>Civil Status</label>
                                    <select class="form-control" name="civil_status">
                                      <option>Single</option>
                                      <option>Married</option>
                                      <option>Widowed</option>
                                      <option>Legally Separated</option>
                                      <option>Separated</option>
                                      <option>Annuled</option>
                                    </select>
                                  </div>
                                  <div class="col col-md-2">
                                    <label>No. of Children</label>
                                    <input type="text" class="form-control" name="no_children">
                                  </div>
                                  <div class="col col-md-2">
                                    <label>Ages</label>
                                    <input type="text" class="form-control" name="ages_children">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col col-md-12">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col col-md-4">
                                    <label>TIN</label>
                                    <input type="text" name="tin_no" class="form-control">
                                  </div>
                                  <div class="col col-md-4">
                                    <label>SSS</label>
                                    <input type="text" name="sss_no" class="form-control">
                                  </div>
                                  <div class="col col-md-4">
                                    <label>Other Identification</label>
                                    <input type="text" name="other_id" class="form-control">
                                  </div>
                                </div>

                                <!-- SOURCE of INCOME -->

                                <div class="form-group">
                                <div class="col col-md-12">
                                  <div class="page-header">
                            <h3 class="text-primary"><i class="fa fa-edit"></i> SOURCE OF INCOME</h3>  <!-- Source of Income -->
                          </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-12">
                                  <label class="text-primary">EMPLOYMENT DETAILS</label>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Employer Name</label>
                                  <input type="text" name="employer_name" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-6">
                                  <label>Address</label>
                                  <input type="text" name="employer_address" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Office Landline</label>
                                  <input type="text" name="employer_landline" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Position</label>
                                  <input type="text" name="employer_position" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Rank</label>
                                  <select class="form-control" name="employer_rank">
                                    <option>Senior Officer/AVP up</option>
                                    <option>Junior Officer</option>
                                    <option>Non Officer</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Years of Service</label>
                                  <input type="text" name="employer_yrs_service" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Gross Annual Income</label>
                                  <input type="text" name="employer_gross_annual" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Other Benefits/ Commissions/Allowances</label>
                                  <input type="text" name="employer_other_benefits" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Immediate Superior</label>
                                  <input type="text" name="employer_superior" class="form-control">
                                </div>
                              </div>

                                <!-- SELF EMPLOYED -->

                              <div class="form-group">
                                <div class="col col-md-12">
                                  <label class="text-primary">SELF-EMPLOYED</label>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Business Name</label>
                                  <input type="text" name="self_business" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Type</label>
                                  <input type="text" name="self_type" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Nature of Business</label>
                                  <input type="text" name="self_nature" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Address</label>
                                  <input type="text" name="self_address" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Telephone</label>
                                  <input type="text" name="self_telephone" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Position</label>
                                  <input type="text" name="self_position" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Years in Operation</label>
                                  <input type="text" name="self_years_operations" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Gross Annual Income</label>
                                  <input type="text" name="self_gross" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Net Annual Income</label>
                                  <input type="text" name="self_net" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-12">
                                  <label>Other Income / Business</label>
                                  <input type="text" name="self_other" class="form-control">
                                </div>
                              </div>


                                <!-- SPOUSE INFORMATION -->
                              <div class="form-group">
                                <div class="col col-md-12">
                                  <div class="page-header">
                            <h3 class="text-primary"><i class="fa fa-edit"></i> SPOUSE INFORMATION</h3>  <!-- SPOUSE INFORMATION-->
                          </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Name of Spouse</label>
                                  <input type="text" name="spouse_name" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Date of Birth</label>
                                  <input type="date" name="spouse_date_birth" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>No. of Children</label>
                                  <input type="text" name="spouse_children" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-6">
                                  <label>Name of Present Employer / Business</label>
                                  <input type="text" name="spouse_employer" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-6">
                                  <label>Address</label>
                                  <input type="text" name="spouse_address" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Title / Position</label>
                                  <input type="text" name="spouse_position" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Rank</label>
                                  <input type="text" name="spouse_rank" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Gross Annual Income</label>
                                  <input type="text" name="spouse_gross" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Office numbers</label>
                                  <input type="text" name="spouse_office_number" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Landline / Mobile Nos</label>
                                  <input type="text" name="spouse_landline" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Email Address</label>
                                  <input type="text" name="spouse_email" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>SSS / GSIS no</label>
                                  <input type="text" name="spouse_sss" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>TIN</label>
                                  <input type="text" name="spouse_tin" class="form-control">
                                </div>
                              </div>


                                <!--CO MAKER -->

                              <div class="form-group">
                                <div class="col col-md-12">
                                  <div class="page-header">
                            <h3 class="text-primary"><i class="fa fa-edit"></i> CO - MAKER'S INFORMATION</h3>  <!-- CO MAKERS info -->
                          </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Name</label>
                                  <input type="text" name="co_name" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Address</label>
                                  <input type="text" name="co_address" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Contact Nos</label>
                                  <input type="text" name="co_contact_nos" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Date of Birth</label>
                                  <input type="date" name="co_birth" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>TIN</label>
                                  <input type="text" name="co_tin" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>SSS / Other Identification</label>
                                  <input type="text" name="co_sss" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Status</label>
                                  <input type="text" name="co_status" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Relationship of Borrowers</label>
                                  <input type="text" name="co_relationship" class="form-control">
                                </div>
                              </div>


                                <!--Co Makeer Employer -->
                              <div class="form-group">
                                <div class="col col-md-12">
                                  <label>EMPLOYMENT DETAILS</label>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Employer Name</label>
                                  <input type="text" name="co_employer_name" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-6">
                                  <label>Address</label>
                                  <input type="text" name="co_employer_address" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Office Landline</label>
                                  <input type="text" name="co_employer_landline" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Position</label>
                                  <input type="text" name="co_employer_position" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Rank</label>
                                  <select class="form-control" name="co_employer_rank">
                                    <option>Senior Officer/AVP up</option>
                                    <option>Junior Officer</option>
                                    <option>Non Officer</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Years of Service</label>
                                  <input type="text" name="co_employer_years" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Gross Annual Income</label>
                                  <input type="text" name="co_employer_gross" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Other Benefits/ Commissions/Allowances</label>
                                  <input type="text" name="co_employer_benefits" class="form-control">
                                </div>
                              </div>

                                <!--CO employer Self Employed -->
                              <div class="form-group">
                                <div class="col col-md-12">
                                  <label>SELF-EMPLOYED</label>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Business Name</label>
                                  <input type="text" name="co_self_name" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Type</label>
                                  <input type="text" name="co_self_type" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Nature of Business</label>
                                  <input type="text" name="co_self_nature" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Address</label>
                                  <input type="text" name="co_self_address" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Telephone</label>
                                  <input type="text" name="co_self_telephone" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Position</label>
                                  <input type="text" name="co_self_position" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Years in Operation</label>
                                  <input type="text" name="co_self_operation" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Gross Annual Income</label>
                                  <input type="text" name="co_self_gross" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Net Annual Income</label>
                                  <input type="text" name="co_self_annual" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-12">
                                  <label>Other Income / Business</label>
                                  <input type="text" name="co_self_otherincome" class="form-control">
                                </div>
                              </div>

                                <div class="form-group">
                                    <div class="col col-md-12">
                                     <hr/>
                                        <button type="submit" class="btn btn-info" name="submit" >Submit</button>
                                        
                                    </div>
                                </div>
                               
                      </div>
                    </div>    
                </div>
            </div>

  </form>






   </div>
</div>

</section>
</div>




<?php include __DIR__.'../../includes/footer.php';?>


<script>

function changePreview(e){
  var files = e.files
  var reader
  if(files.Length === 0){
    console.log('empty');
  }else{
    reader = new FileReader();
    reader.onload = (e)=>{
      $('#imgpreview').attr('src',e.target.result)
    }

    reader.readAsDataURL(files[0]);
  }
}

</script>

</body>
</html>