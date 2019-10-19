<?php

namespace controller;

use base\controller;
use model\profile;
use helper\session;
use helper\input;


Class profilecontroller extends controller {
	public function __construct(){
		parent::__construct(new profile);
	}

	public function index(){
		$profiles = $this->model->getProfiles();
		$this->view->make('profile/index',['profiles'=>$profiles]);
	}

	public function profile_details(){
		$idno = input::get('refno');

		$res = $this->model->profile_details($idno);
		$loanhistory = $this->model->profile_history($idno);

		$loancount = $loanhistory != NULL ? count($loanhistory) : 0;

		if($loancount == 0){
			$loanhistory = [];
		}
		$this->view->make('profile/details',['details'=>$res,'loanhistory'=>$loanhistory]);
	}

	public function updateProfile(){

		$empid = input::post('empid');

		$profiledetails = $this->model->profile_details($empid);

		$oldimage = $profiledetails['img'];

		$target_dir = PUBLIC_PATH."/image/profiles/";

		$filename = time().basename($_FILES["imgfile"]["name"]);
		$target_file = $target_dir . $filename;

		if(basename($_FILES["imgfile"]["name"]) != ""){
			$res = move_uploaded_file($_FILES["imgfile"]["tmp_name"], $target_file);
			unlink(PUBLIC_PATH."/image/profiles/".$oldimage);	

		}

		$imgfilename = basename($_FILES["imgfile"]["name"]) == "" ? $oldimage : $filename;
		


		$firstname = input::post('firstname');
		$middlename = input::post('middlename');
		$surname = input::post('surname');
		$permanent_address = input::post('permanent_address'); 
		$permanent_ownership = input::post('permanent_ownership'); 
		$permanent_ownership_years = input::post('permanent_ownership_years'); 
		$provincial_address = input::post('provincial_address'); 
		$provincial_ownership = input::post('provincial_ownership');
		$provincial_ownership_years = input::post('provincial_ownership_years');
		$home_landline = input::post('home_landline');
		$mobile_nos = input::post('mobile_nos'); 
		$email_address = input::post('email_address'); 
		$date_birth = input::post('date_birth') != "" ? input::post('date_birth') : "0000-00-00";
		$place_birth = input::post('place_birth');
		$gender = input::post('gender');
		$nationality = input::post('nationality');
		$educational = input::post('educational');
		$educational_other = input::post('educational_other'); 
		$residency = input::post('residency'); 
		$civil_status = input::post('civil_status'); 
		$no_children = input::post('no_children'); 
		$ages_children = input::post('ages_children'); 
		$tin_no  = input::post('tin_no');
		$sss_no = input::post('sss_no');
		$other_id = input::post('other_id');

		$employer_name = input::post('employer_name'); 
		$employer_address = input::post('employer_address');
		$employer_landline = input::post('employer_landline');
		$employer_position = input::post('employer_position');
		$employer_rank = input::post('employer_rank');
		$employer_yrs_service = input::post('employer_yrs_service');
		$employer_gross_annual = input::post('employer_gross_annual');
		$employer_other_benefits = input::post('employer_other_benefits');
		$employer_superior = input::post('employer_superior');

		$self_business = input::post('self_business');
		$self_type = input::post('self_type');
		$self_nature = input::post('self_nature');
		$self_address = input::post('self_address');
		$self_telephone = input::post('self_telephone');
		$self_position = input::post('self_position');
		$self_years_operations = input::post('self_years_operations');
		$self_gross = input::post('self_gross');
		$self_net = input::post('self_net');
		$self_other = input::post('self_other');


		$spouse_name = input::post('spouse_name');
		$spouse_date_birth = input::post('spouse_date_birth') != "" ? input::post('spouse_date_birth') : "0000-00-00";
		$spouse_children = input::post('spouse_children');
		$spouse_employer = input::post('spouse_employer');
		$spouse_address = input::post('spouse_address');
		$spouse_position = input::post('spouse_position'); 
		$spouse_rank = input::post('spouse_rank'); 
		$spouse_gross = input::post('spouse_gross'); 
		$spouse_office_number = input::post('spouse_office_number');
		$spouse_landline = input::post('spouse_landline');
		$spouse_email = input::post('spouse_email');
		$spouse_sss = input::post('spouse_sss');
		$spouse_tin = input::post('spouse_tin');

		$co_name = input::post('co_name');
		$co_address = input::post('co_address');
		$co_contact_nos = input::post('co_contact_nos');
		$co_birth = input::post('co_birth') != "" ? input::post('co_birth') : "0000-00-00";
		$co_tin = input::post('co_tin');
		$co_sss = input::post('co_sss');
		$co_status = input::post('co_status');
		$co_relationship = input::post('co_relationship');

		$co_employer_name = input::post('co_employer_name');
		$co_employer_address = input::post('co_employer_address');
		$co_employer_landline = input::post('co_employer_landline');
		$co_employer_position = input::post('co_employer_position');
		$co_employer_rank = input::post('co_employer_rank');
		$co_employer_years = input::post('co_employer_years');
		$co_employer_gross = input::post('co_employer_gross ');
		$co_employer_benefits = input::post('co_employer_benefits');

		$co_self_name = input::post('co_self_name');
		$co_self_type = input::post('co_self_type');
		$co_self_nature = input::post('co_self_nature');
		$co_self_address = input::post('co_self_address');
		$co_self_telephone = input::post('co_self_telephone');
		$co_self_position = input::post('co_self_position');
		$co_self_operation = input::post('co_self_operation');
		$co_self_gross = input::post('co_self_gross');
		$co_self_annual = input::post('co_self_annual');
		$co_self_otherincome = input::post('co_self_otherincome');
		

		$data = [
			$firstname,
			$middlename ,
			$surname ,
			$permanent_address ,
			$permanent_ownership ,
			$permanent_ownership_years ,
			$provincial_address ,
			$provincial_ownership,
			$provincial_ownership_years,
			$home_landline ,
			$mobile_nos ,
			$email_address ,
			$date_birth ,
			$place_birth ,
			$gender,
			$nationality ,
			$educational,
			$educational_other,
			$residency ,
			$civil_status,
			$no_children ,
			$ages_children ,
			$tin_no  ,
			$sss_no ,
			$other_id,

			$employer_name ,
			$employer_address,
			$employer_landline ,
			$employer_position,
			$employer_rank,
			$employer_yrs_service ,
			$employer_gross_annual,
			$employer_other_benefits,
			$employer_superior ,

			$self_business,
			$self_type ,
			$self_nature,
			$self_address ,
			$self_telephone,
			$self_position ,
			$self_years_operations ,
			$self_gross ,
			$self_net ,
			$self_other,


			$spouse_name ,
			$spouse_date_birth ,
			$spouse_children ,
			$spouse_employer,
			$spouse_address ,
			$spouse_position ,
			$spouse_rank ,
			$spouse_gross ,
			$spouse_office_number,
			$spouse_landline,
			$spouse_email ,
			$spouse_sss,
			$spouse_tin ,

			$co_name,
			$co_address,
			$co_contact_nos ,
			$co_birth ,
			$co_tin,
			$co_sss ,
			$co_status ,
			$co_relationship ,

			$co_employer_name,
			$co_employer_address,
			$co_employer_landline ,
			$co_employer_position ,
			$co_employer_rank,
			$co_employer_years ,
			$co_employer_gross,
			$co_employer_benefits ,

			$co_self_name,
			$co_self_type,
			$co_self_nature,
			$co_self_address ,
			$co_self_telephone,
			$co_self_position,
			$co_self_operation,
			$co_self_gross ,
			$co_self_annual ,
			$co_self_otherincome ,
			$imgfilename,
			$empid,
		];

		$res = $this->model->updateProfile($data);

		if($res){

			$message = "<div class=\"alert alert-dismissible alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Profile has been udpated.</div>";
		}else{
			$message = "<div class=\"alert alert-dismissible alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Something Went Wrong!</div>";
		}

		session::set('message' , $message);
		$this->view->redirect('profile_details?refno='.urlencode($empid).'');



	}


	public function newProfile(){
		$target_dir = PUBLIC_PATH."/image/profiles/";

		$filename = time().basename($_FILES["imgfile"]["name"]);
		$target_file = $target_dir . $filename;


		$res = move_uploaded_file($_FILES["imgfile"]["tmp_name"], $target_file);

		$imgfilename = basename($_FILES["imgfile"]["name"]) == "" ? "user.png" : $filename;

		$firstname = input::post('firstname');
		$middlename = input::post('middlename');
		$surname = input::post('surname');
		$permanent_address = input::post('permanent_address'); 
		$permanent_ownership = input::post('permanent_ownership'); 
		$permanent_ownership_years = input::post('permanent_ownership_years'); 
		$provincial_address = input::post('provincial_address'); 
		$provincial_ownership = input::post('provincial_ownership');
		$provincial_ownership_years = input::post('provincial_ownership_years');
		$home_landline = input::post('home_landline');
		$mobile_nos = input::post('mobile_nos'); 
		$email_address = input::post('email_address'); 
		$date_birth = input::post('date_birth') != "" ? input::post('date_birth') : "0000-00-00";
		$place_birth = input::post('place_birth');
		$gender = input::post('gender');
		$nationality = input::post('nationality');
		$educational = input::post('educational');
		$educational_other = input::post('educational_other'); 
		$residency = input::post('residency'); 
		$civil_status = input::post('civil_status'); 
		$no_children = input::post('no_children'); 
		$ages_children = input::post('ages_children'); 
		$tin_no  = input::post('tin_no');
		$sss_no = input::post('sss_no');
		$other_id = input::post('other_id');

		$employer_name = input::post('employer_name'); 
		$employer_address = input::post('employer_address');
		$employer_landline = input::post('employer_landline');
		$employer_position = input::post('employer_position');
		$employer_rank = input::post('employer_rank');
		$employer_yrs_service = input::post('employer_yrs_service');
		$employer_gross_annual = input::post('employer_gross_annual');
		$employer_other_benefits = input::post('employer_other_benefits');
		$employer_superior = input::post('employer_superior');

		$self_business = input::post('self_business');
		$self_type = input::post('self_type');
		$self_nature = input::post('self_nature');
		$self_address = input::post('self_address');
		$self_telephone = input::post('self_telephone');
		$self_position = input::post('self_position');
		$self_years_operations = input::post('self_years_operations');
		$self_gross = input::post('self_gross');
		$self_net = input::post('self_net');
		$self_other = input::post('self_other');


		$spouse_name = input::post('spouse_name');
		$spouse_date_birth = input::post('spouse_date_birth') != "" ? input::post('spouse_date_birth') : "0000-00-00";
		$spouse_children = input::post('spouse_children');
		$spouse_employer = input::post('spouse_employer');
		$spouse_address = input::post('spouse_address');
		$spouse_position = input::post('spouse_position'); 
		$spouse_rank = input::post('spouse_rank'); 
		$spouse_gross = input::post('spouse_gross'); 
		$spouse_office_number = input::post('spouse_office_number');
		$spouse_landline = input::post('spouse_landline');
		$spouse_email = input::post('spouse_email');
		$spouse_sss = input::post('spouse_sss');
		$spouse_tin = input::post('spouse_tin');

		$co_name = input::post('co_name');
		$co_address = input::post('co_address');
		$co_contact_nos = input::post('co_contact_nos');
		$co_birth = input::post('co_birth') != "" ? input::post('co_birth') : "0000-00-00";
		$co_tin = input::post('co_tin');
		$co_sss = input::post('co_sss');
		$co_status = input::post('co_status');
		$co_relationship = input::post('co_relationship');

		$co_employer_name = input::post('co_employer_name');
		$co_employer_address = input::post('co_employer_address');
		$co_employer_landline = input::post('co_employer_landline');
		$co_employer_position = input::post('co_employer_position');
		$co_employer_rank = input::post('co_employer_rank');
		$co_employer_years = input::post('co_employer_years');
		$co_employer_gross = input::post('co_employer_gross ');
		$co_employer_benefits = input::post('co_employer_benefits');

		$co_self_name = input::post('co_self_name');
		$co_self_type = input::post('co_self_type');
		$co_self_nature = input::post('co_self_nature');
		$co_self_address = input::post('co_self_address');
		$co_self_telephone = input::post('co_self_telephone');
		$co_self_position = input::post('co_self_position');
		$co_self_operation = input::post('co_self_operation');
		$co_self_gross = input::post('co_self_gross');
		$co_self_annual = input::post('co_self_annual');
		$co_self_otherincome = input::post('co_self_otherincome');


		$data = [
			$firstname,
			$middlename ,
			$surname ,
			$permanent_address ,
			$permanent_ownership ,
			$permanent_ownership_years ,
			$provincial_address ,
			$provincial_ownership,
			$provincial_ownership_years,
			$home_landline ,
			$mobile_nos ,
			$email_address ,
			$date_birth ,
			$place_birth ,
			$gender,
			$nationality ,
			$educational,
			$educational_other,
			$residency ,
			$civil_status,
			$no_children ,
			$ages_children ,
			$tin_no  ,
			$sss_no ,
			$other_id,

			$employer_name ,
			$employer_address,
			$employer_landline ,
			$employer_position,
			$employer_rank,
			$employer_yrs_service ,
			$employer_gross_annual,
			$employer_other_benefits,
			$employer_superior ,

			$self_business,
			$self_type ,
			$self_nature,
			$self_address ,
			$self_telephone,
			$self_position ,
			$self_years_operations ,
			$self_gross ,
			$self_net ,
			$self_other,


			$spouse_name ,
			$spouse_date_birth ,
			$spouse_children ,
			$spouse_employer,
			$spouse_address ,
			$spouse_position ,
			$spouse_rank ,
			$spouse_gross ,
			$spouse_office_number,
			$spouse_landline,
			$spouse_email ,
			$spouse_sss,
			$spouse_tin ,

			$co_name,
			$co_address,
			$co_contact_nos ,
			$co_birth ,
			$co_tin,
			$co_sss ,
			$co_status ,
			$co_relationship ,

			$co_employer_name,
			$co_employer_address,
			$co_employer_landline ,
			$co_employer_position ,
			$co_employer_rank,
			$co_employer_years ,
			$co_employer_gross,
			$co_employer_benefits ,

			$co_self_name,
			$co_self_type,
			$co_self_nature,
			$co_self_address ,
			$co_self_telephone,
			$co_self_position,
			$co_self_operation,
			$co_self_gross ,
			$co_self_annual ,
			$co_self_otherincome ,
			$imgfilename,
		];

		$res = $this->model->newProfile($data);

		if($res){

			$message = "<div class=\"alert alert-dismissible alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Profile has been created.</div>";
		}else{
			$message = "<div class=\"alert alert-dismissible alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Something Went Wrong!</div>";
		}

		session::set('message' , $message);
		$this->view->redirect('newBorrower');



	}
}