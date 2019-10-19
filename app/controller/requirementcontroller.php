<?php

namespace controller;

use base\controller;
use model\requirement;
use helper\session;
use helper\input;


class requirementcontroller extends controller {

	public function __construct(){
		parent::__construct(new requirement);
	}

	public function index(){
		$list = $this->model->getList();
		$this->view->make('requirement/index',['list'=>$list]);
	}

	public function removeRequirement(){
		$idno = input::post('idno');
		$res = $this->model->removeRequirement($idno);

	
		$response = $res ? 1 : 0;
		echo $response;
	}

	public function removereq(){
		$img = input::post('img');
		$data = [input::post('loanid'),input::post('reqid')];
		$res = $this->model->removereq($data);
	    $response = $res ? 1 : 0;

	    if($res){
	    	unlink(PUBLIC_PATH."/documents_Uploads/".$img);
	    	$message = "<div class=\"alert alert-dismissible alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Requirement has been Removed</div>";
	    }else{
	    	$message =  "<div class=\"alert alert-dismissible alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Something went wrong.</div>";
	    }
	    session::set('message',$message);
		echo $response;
	}

	public function addRequirement(){
		$requirement = input::post('requirement');

		$res = $this->model->addRequirement($requirement);

		$response = $res ? 1 : 0;
		echo $response;
	}

	public function updateRequirement(){
		$idno = input::post('idno');
		$requirement = input::post('requirement');

		$res = $this->model->updateRequirement([$requirement,$idno]);
		$response = $res ? 1 : 0;
		echo $response;
	}

	public function uploadRequirement(){
		$target_dir = PUBLIC_PATH."/documents_Uploads/";
		$filename = time().basename($_FILES["imgfile"]["name"]);
		$target_file = $target_dir . $filename;
		$uploadOk = 1;

		if($uploadOk==1){
			if (move_uploaded_file($_FILES["imgfile"]["tmp_name"], $target_file)) {
		     //   echo "The file ". $filename. " has been uploaded.";
		    } else {
		     //   echo "Sorry, there was an error uploading your file.";
		    }
		}

		$loanID = input::post("txtloanID");
		$requirementID = input::post("txtReqID");
		$datetimenow = date('Y-m-d H:i:s',time());
		$img = $filename;

		$data = [$loanID,$requirementID,$datetimenow,$img];

		$res = $this->model->uploadRequirement($data);

		$response = $res ? 1 : 0;

		$message = $response == 1 ? "<div class=\"alert alert-dismissible alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Requirement has been uploaded</div>" : "<div class=\"alert alert-dismissible alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Something went wrong.</div>";
		session::set('message',$message);
		$this->view->redirect('loanDetails?loanID='.$loanID.'');
	}

}





?>