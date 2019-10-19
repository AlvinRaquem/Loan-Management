
<?php include __DIR__.'../../includes/header.php';?>



<section class="content-header">
  <h1>
    <span class="fa fa-user"></span>
     Reference Number: <?= $_GET['refno'];?>
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
            $img = $details['img'];
            $empid = $details['idno'];
            $firstname =$details['firstname'];
            $middlename = $details['middlename'];
            $surname = $details['surname'];
            $permanent_address = $details['permanentAddress'];
            $permanent_ownership = $details['permanentOwnership'];
            $permanent_ownership_years = $details['permanentYears'];
            $provincial_address = $details['provinceAdd'];
            $provincial_ownership = $details['provinceOwnership'];
            $provincial_ownership_years = $details['provinceYears'];
            $home_landline = $details['homeLandline'];
            $mobile_nos = $details['mobileNos'];
            $email_address = $details['emailAdd'];
            $date_birth = $details['dateBirth'];
            $place_birth = $details['placeBirth'];
            $gender = $details['gender'];
            $nationality = $details['nationality'];
            $educational = $details['educational'];
            $educational_other = $details['educationalOther'];
            $residency = $details['residency']; 
            $civil_status = $details['civilStatus'];
            $no_children = $details['noChildren'];
            $ages_children = $details['agesChildren'];
            $tin_no  = $details['tinNo'];
            $sss_no = $details['sssNo'];
            $other_id = $details['otherID'];


            $employer_name = $details['employerName']; 
            $employer_address = $details['employerAdd'];
            $employer_landline = $details['employerLandline'];
            $employer_position = $details['employerPosition'];
            $employer_rank = $details['employerRank'];
            $employer_yrs_service = $details['employerYrsService'];
            $employer_gross_annual = $details['employerGross'];
            $employer_other_benefits = $details['employerBenefits'];
            $employer_superior = $details['employerSuperior'];


            $self_business = $details['selfBusinessName'];
            $self_type = $details['selfBusinessType'];
            $self_nature = $details['selfBusinessNature'];
            $self_address = $details['selffBussinessAddress'];
            $self_telephone = $details['selfBusinessTelephone'];
            $self_position = $details['selfBusinessPosition'];
            $self_years_operations = $details['selfBusinessOperation'];
            $self_gross = $details['selfBusinessGross'];
            $self_net = $details['selfBusinessNet'];
            $self_other = $details['selfBusinessOtherIncome'];


            $spouse_name = $details['spouseName'];
            $spouse_date_birth = $details['spouseBirth'];
            $spouse_children = $details['spouseChildren'];
            $spouse_employer = $details['spouseEmployer'];
            $spouse_address = $details['spouseAddress'];
            $spouse_position = $details['spousePosition'];
            $spouse_rank = $details['spouseRank'];
            $spouse_gross = $details['spouseGross'];
            $spouse_office_number = $details['spouseOfcNo'];
            $spouse_landline = $details['spouseLandline'];
            $spouse_email = $details['spouseEmail'];
            $spouse_sss = $details['spouseSSS'];
            $spouse_tin = $details['spouseTin'];

            $co_name = $details['coName'];
            $co_address = $details['coAddress'];
            $co_contact_nos = $details['coContactNos'];
            $co_birth = $details['coDateBirth'];
            $co_tin = $details['coTinNo'];
            $co_sss = $details['coSSother'];
            $co_status = $details['coStatus'];
            $co_relationship = $details['coRelationship'];

            $co_employer_name = $details['coEmployerName'];
            $co_employer_address = $details['coEmployerAdd'];
            $co_employer_landline = $details['coEmployerLandline'];
            $co_employer_position = $details['coEmployerPosition'];
            $co_employer_rank = $details['coEmployerRank'];
            $co_employer_years = $details['coEmployerService'];
            $co_employer_gross = $details['coEmployerGross'];
            $co_employer_benefits = $details['coEmployerBenefits'];

            $co_self_name = $details['coSelfName'];
            $co_self_type = $details['coSelfType'];
            $co_self_nature = $details['coSelfNature'];
            $co_self_address = $details['coSelfAddress'];
            $co_self_telephone = $details['coSelfTelephone'];
            $co_self_position = $details['coSelfPosition'];
            $co_self_operation = $details['coSelfOperation'];
            $co_self_gross = $details['coSelfAnnual'];
            $co_self_annual = $details['coSelfNet'];
            $co_self_otherincome =$details['coSelfOtherIncome'];

    ?>

          <form role="form" method="POST" action="updateProfile" enctype="multipart/form-data">
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
                                  
                                    <img src="public/image/profiles/<?= $img;?>" id="imgpreview" style="height: 200px;width: 200px">
                                    <input type="file" name="imgfile" accept=".png,.jpg" onchange="changePreview(this)">
                                  </div>

                              </div>

                                <div class="form-group">
                                  <div class="col col-md-4">
                                    <input type="hidden" name="empid" value="<?= $empid;?>">
                                    <label>First Name</label>
                                    <input type="text" name="firstname" class="form-control" 
                                        value="<?php echo $firstname; ?>" required>
                                  </div>
                                  <div class="col col-md-4">
                                    <label>Middle Name</label>
                                    <input type="text" name="middlename" class="form-control" value="<?php echo $middlename; ?>" required>
                                  </div>
                                  <div class="col col-md-4">
                                    <label>Surame</label>
                                    <input type="text" name="surname" class="form-control" value="<?php echo $surname; ?>" required>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col col-md-12">
                                    <label>Permanent Address</label>
                                    <input type="text" name="permanent_address"  value="<?php echo $permanent_address; ?>" class="form-control">
                                  </div>  
                                </div>
                                <div class="form-group">
                                  <div class="col col-md-4">
                                    <label>Ownership</label>
                                    <select class="form-control" name="permanent_ownership">
                                      <option><?php echo $permanent_ownership; ?></option>
                                      <option>Owned</option>
                                      <option>Mortgaged with</option>
                                      <option>Rented</option>
                                      <option>Free use</option>
                                    </select> 
                                  </div>  
                                  <div class="col col-md-8">
                                    <label>Length of Stay (in years)</label>
                                    <input type="text" name="permanent_ownership_years" class="form-control"
                                        value="<?php echo $permanent_ownership_years; ?>">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col col-md-4">
                                    <label>Provincial Address</label>
                                    <input type="text" name="provincial_address" class="form-control"
                                        value="<?php echo $provincial_address; ?>">
                                  </div>
                                  <div class="col col-md-4">
                                    <label>Ownership</label>
                                    <select class="form-control" name="provincial_ownership">
                                      <option><?php echo $provincial_ownership; ?></option>
                                      <option>Owned</option>
                                      <option>Mortgaged with</option>
                                      <option>Rented</option>
                                      <option>Free use</option>
                                    </select> 
                                  </div>
                                  <div class="col col-md-4">
                                    <label>Length of Stay (in years)</label>
                                    <input type="text" name="provincial_ownership_years" class="form-control"
                                        value="<?php echo $permanent_ownership_years; ?>">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col col-md-4">
                                    <label>Home Landline</label>
                                    <input type="text" name="home_landline" class="form-control"
                                        value="<?php echo $home_landline; ?>">
                                  </div>
                                  <div class="col col-md-4">
                                    <label>Mobile Nos</label>
                                    <input type="text" name="mobile_nos" class="form-control"
                                        value="<?php echo $mobile_nos; ?>">
                                  </div>
                                  <div class="col col-md-4">
                                    <label>Email Address</label>
                                    <input type="text" name="email_address" class="form-control"
                                        value="<?php echo $email_address; ?>">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col col-md-4">
                                    <label>Date of Birth</label>
                                    <input type="Date" name="date_birth" class="form-control"
                                        value="<?php echo $date_birth; ?>">
                                  </div>
                                  <div class="col col-md-4">
                                    <label>Place of Birth</label>
                                    <input type="text" name="place_birth" class="form-control"
                                        value="<?php echo $place_birth; ?>">
                                  </div>
                                  <div class="col col-md-2">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender">
                                      <option><?php echo $gender; ?></option>
                                      <option>Male</option>
                                      <option>Female</option>
                                    </select>
                                  </div>
                                  <div class="col col-md-2">
                                    <label>Nationality</label>
                                    <input type="text" name="nationality" class="form-control"
                                        value="<?php echo $nationality; ?>">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col col-md-4">
                                    <label>Educational Attainment</label>
                                    <select class="form-control" name="educational">
                                      <option><?php echo $educational; ?></option>
                                      <option>Elementary</option>
                                      <option>High School</option>
                                      <option>College Undergraduate</option>
                                      <option>College Graduate</option>
                                      <option>vocational</option>
                                      <option>post graduate</option>
                                      <option>doctorate</option>
                                      <option>Other</option>
                                    </select>
                                    <input type="text" name="educational_other" class="form-control"
                                        value="<?php echo $educational_other; ?>">
                                  </div>
                                  <div class="col col-md-2">
                                    <label>Residency</label>
                                    <select class="form-control" name="residency">
                                      <option><?php echo $residency; ?></option>
                                      <option>Resident/Citizen</option>
                                      <option>Resident Alien</option>
                                      <option>Non-resident Alien</option>
                                    </select>
                                  </div>
                                  <div class="col col-md-2">
                                    <label>Civil Status</label>
                                    <select class="form-control" name="civil_status">
                                      <option><?php echo $civil_status; ?></option>
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
                                    <input type="text" class="form-control" name="no_children"
                                        value="<?php echo $no_children; ?>">
                                  </div>
                                  <div class="col col-md-2">
                                    <label>Ages</label>
                                    <input type="text" class="form-control" name="ages_children"
                                        value="<?php echo $ages_children; ?>">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col col-md-12">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col col-md-4">
                                    <label>TIN</label>
                                    <input type="text" name="tin_no" class="form-control"
                                        value="<?php echo $tin_no; ?>">
                                  </div>
                                  <div class="col col-md-4">
                                    <label>SSS</label>
                                    <input type="text" name="sss_no" class="form-control"
                                        value="<?php echo $sss_no; ?>">
                                  </div>
                                  <div class="col col-md-4">
                                    <label>Other Identification</label>
                                    <input type="text" name="other_id" class="form-control"
                                        value="<?php echo $other_id; ?>">
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
                                  <input type="text" name="employer_name" class="form-control" value="<?php echo $employer_name; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-6">
                                  <label>Address</label>
                                  <input type="text" name="employer_address" class="form-control" value="<?php echo $employer_address; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Office Landline</label>
                                  <input type="text" name="employer_landline" class="form-control" value="<?php echo $employer_landline; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Position</label>
                                  <input type="text" name="employer_position" class="form-control"  value="<?php echo $employer_position; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Rank</label>
                                  <select class="form-control" name="employer_rank">
                                    <option><?php echo $employer_rank; ?></option>
                                    <option>Senior Officer/AVP up</option>
                                    <option>Junior Officer</option>
                                    <option>Non Officer</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Years of Service</label>
                                  <input type="text" name="employer_yrs_service" class="form-control"  value="<?php echo $employer_yrs_service; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Gross Annual Income</label>
                                  <input type="text" name="employer_gross_annual" class="form-control" value="<?php echo $employer_gross_annual; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Other Benefits/ Commissions/Allowances</label>
                                  <input type="text" name="employer_other_benefits" class="form-control" value="<?php echo $employer_other_benefits; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Immediate Superior</label>
                                  <input type="text" name="employer_superior" class="form-control" value="<?php echo $employer_superior; ?>">
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
                                  <input type="text" name="self_business" class="form-control" value="<?php echo $self_business; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Type</label>
                                  <input type="text" name="self_type" class="form-control" value="<?php echo $self_type; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Nature of Business</label>
                                  <input type="text" name="self_nature" class="form-control" value="<?php echo $self_nature; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Address</label>
                                  <input type="text" name="self_address" class="form-control" value="<?php echo $self_address; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Telephone</label>
                                  <input type="text" name="self_telephone" class="form-control" value="<?php echo $self_telephone; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Position</label>
                                  <input type="text" name="self_position" class="form-control" value="<?php echo $self_position; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Years in Operation</label>
                                  <input type="text" name="self_years_operations" class="form-control" value="<?php echo $self_years_operations; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Gross Annual Income</label>
                                  <input type="text" name="self_gross" class="form-control" value="<?php echo $self_gross; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Net Annual Income</label>
                                  <input type="text" name="self_net" class="form-control" value="<?php echo $self_net; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-12">
                                  <label>Other Income / Business</label>
                                  <input type="text" name="self_other" class="form-control" value="<?php echo $self_other; ?>">
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
                                  <input type="text" name="spouse_name" class="form-control" value="<?php echo $spouse_name; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Date of Birth</label>
                                  <input type="date" name="spouse_date_birth" class="form-control" value="<?php echo $spouse_date_birth; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>No. of Children</label>
                                  <input type="text" name="spouse_children" class="form-control" value="<?php echo $spouse_children; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-6">
                                  <label>Name of Present Employer / Business</label>
                                  <input type="text" name="spouse_employer" class="form-control" value="<?php echo $spouse_employer; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-6">
                                  <label>Address</label>
                                  <input type="text" name="spouse_address" class="form-control" value="<?php echo $spouse_address; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Title / Position</label>
                                  <input type="text" name="spouse_position" class="form-control" value="<?php echo $spouse_position; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Rank</label>
                                  <input type="text" name="spouse_rank" class="form-control" value="<?php echo $spouse_rank; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Gross Annual Income</label>
                                  <input type="text" name="spouse_gross" class="form-control" value="<?php echo $spouse_gross; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Office numbers</label>
                                  <input type="text" name="spouse_office_number" class="form-control" value="<?php echo $spouse_office_number; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Landline / Mobile Nos</label>
                                  <input type="text" name="spouse_landline" class="form-control" value="<?php echo $spouse_landline; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Email Address</label>
                                  <input type="text" name="spouse_email" class="form-control" value="<?php echo $spouse_email; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>SSS / GSIS no</label>
                                  <input type="text" name="spouse_sss" class="form-control" value="<?php echo $spouse_sss; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>TIN</label>
                                  <input type="text" name="spouse_tin" class="form-control" value="<?php echo $spouse_tin; ?>">
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
                                  <input type="text" name="co_name" class="form-control" value="<?php echo $co_name; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Address</label>
                                  <input type="text" name="co_address" class="form-control" value="<?php echo $co_address; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Contact Nos</label>
                                  <input type="text" name="co_contact_nos" class="form-control" value="<?php echo $co_contact_nos; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Date of Birth</label>
                                  <input type="date" name="co_birth" class="form-control" value="<?php echo $co_birth; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>TIN</label>
                                  <input type="text" name="co_tin" class="form-control" value="<?php echo $co_tin; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>SSS / Other Identification</label>
                                  <input type="text" name="co_sss" class="form-control" value="<?php echo $co_sss; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Status</label>
                                  <input type="text" name="co_status" class="form-control" value="<?php echo $co_status; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Relationship of Borrowers</label>
                                  <input type="text" name="co_relationship" class="form-control" value="<?php echo $co_relationship; ?>">
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
                                  <input type="text" name="co_employer_name" class="form-control" value="<?php echo $co_employer_name; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-6">
                                  <label>Address</label>
                                  <input type="text" name="co_employer_address" class="form-control" value="<?php echo $co_employer_address; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Office Landline</label>
                                  <input type="text" name="co_employer_landline" class="form-control" value="<?php echo $co_employer_landline; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Position</label>
                                  <input type="text" name="co_employer_position" class="form-control" value="<?php echo $co_employer_position; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Rank</label>
                                  <select class="form-control" name="co_employer_rank">
                                    <option><?php echo $co_employer_rank; ?></option>
                                    <option>Senior Officer/AVP up</option>
                                    <option>Junior Officer</option>
                                    <option>Non Officer</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Years of Service</label>
                                  <input type="text" name="co_employer_years" class="form-control" value="<?php echo $co_employer_years; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-2">
                                  <label>Gross Annual Income</label>
                                  <input type="text" name="co_employer_gross" class="form-control" value="<?php echo $co_employer_gross; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Other Benefits/ Commissions/Allowances</label>
                                  <input type="text" name="co_employer_benefits" class="form-control" value="<?php echo $co_employer_benefits; ?>">
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
                                  <input type="text" name="co_self_name" class="form-control" value="<?php echo $co_self_name; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Type</label>
                                  <input type="text" name="co_self_type" class="form-control" value="<?php echo $co_self_type; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Nature of Business</label>
                                  <input type="text" name="co_self_nature" class="form-control" value="<?php echo $co_self_nature; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Address</label>
                                  <input type="text" name="co_self_address" class="form-control" value="<?php echo $co_self_address; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Telephone</label>
                                  <input type="text" name="co_self_telephone" class="form-control" value="<?php echo $co_self_telephone; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Position</label>
                                  <input type="text" name="co_self_position" class="form-control" value="<?php echo $co_self_position; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Years in Operation</label>
                                  <input type="text" name="co_self_operation" class="form-control" value="<?php echo $co_self_operation; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Gross Annual Income</label>
                                  <input type="text" name="co_self_gross" class="form-control" value="<?php echo $co_self_gross; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-4">
                                  <label>Net Annual Income</label>
                                  <input type="text" name="co_self_annual" class="form-control" value="<?php echo $co_self_annual; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col col-md-12">
                                  <label>Other Income / Business</label>
                                  <input type="text" name="co_self_otherincome" class="form-control" value="<?php echo $co_self_otherincome; ?>">
                                </div>
                              </div>

                                <div class="form-group">
                                    <div class="col col-md-12">
                                     <hr/>
                                        <a href="profile_list"><button type="button" class="btn btn-default"> Close</button></a>
                                        <button type="submit" class="btn btn-info pull-right" name="submit" >Update</button>
                                        
                                    </div>
                                </div>
                               
                      </div>
                    </div>    
                </div>
            </div>

  </form>






   </div>

       <div class="panel panel-default">
        <div class="panel-heading">LOAN HISTORY<a href="applyloan?idno=<?= $_GET['refno'];?>" class="pull-right">Apply Loan</a>></div>
   <div  class="panel-body">
                   <div class="table-responsive">
                      <table class="table table-bordered table-striped table-condensed">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>RefNo</th>
                              <th>Type</th>
                              <th>Date</th>
                              <th>Purpose</th>
                              <th>Amount</th>
                              <th>Term</th>
                              <th>Interest</th>
                              <th>Total Amount</th>
                              <th>Interest Income</th>
                              <th>Monthly Payment</th>
                              <th>Running Balance</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $x=1;?>
                            <?php foreach($loanhistory as $loan):?>
                              <tr>
                                  <td><?= $x++;?></td>
                                  <td><a href="loanDetails?loanID=<?= $loan['refno'];?>"><?= $loan['refno'];?></a></td>
                                  <td><?= $loan['type'];?></td>
                                  <td><?= $loan['dateloan'];?></td>
                                  <td><?= $loan['purpose'];?></td>
                                  <td><?= number_format($loan['loanAmount'],2);?></td>
                                  <td><?= $loan['termMonth'];?></td>
                                  <td><?= $loan['interest'];?></td>
                                  <td><?= number_format($loan['ttlAmount'],2);?></td>
                                  <td><?= number_format($loan['interestIncome'],2);?></td>
                                  <td><?= number_format($loan['montlyPayment'],2);?></td>
                                  <td><?= number_format($loan['balance'],2);?></td>
                              </tr>

                            <?php endforeach?>

                          </tbody>
                      </table>

                   </div>
    </div>
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