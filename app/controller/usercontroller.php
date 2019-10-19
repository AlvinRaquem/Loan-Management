<?php

namespace controller;

use base\controller;
use model\user;
use helper\session;
use helper\input;

class usercontroller extends controller {

		public function __construct(){
			parent::__construct(new user);
		}

		public function index(){
			$users = $this->model->getUsers();
			$data = ['users'=>$users];
			$this->view->make('user/manage_user',$data);
		}

		public function edit(){
			$idno = input::get('idno');
			$user = $this->model->getuser($idno);
			$data = ['user'=>$user];
			$this->view->make('user/modifyuser',$data);

		}
		

		public function adduser(){
			$Name = input::post('txtName');
			$Email = input::post('txtEmail');
			$Level =  input::post('txtLevel');
			$User = input::post('txtUser'); 
			$Pass = input::post('txtpass');
			$Pass2 = input::post('txtpass2');

			$res = $this->model->checkduplicate($User);

			$countuser = $res == NULL ? 0 : count($res);

			if($countuser > 0){
				$message = "<div class=\"alert alert-dismissible alert-warning\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Username Already Exists!</div>";
			}else{

				if($Pass == $Pass2){
						$data = [$Name,$Email,$Level,$User,$Pass];
						$res = $this->model->adduser($data);
						if($res){

							$message = "<div class=\"alert alert-dismissible alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>User has been created.</div>";
						}else{
							$message = "<div class=\"alert alert-dismissible alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Something Went Wrong!</div>";
						}
				}else{
						$message = "<div class=\"alert alert-dismissible alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Password does not match the confirm password.</div>";
				}
				
			}

			session::set('message',$message);
			$this->view->redirect('new_user');
		}


		public function checkuser(){
			$username = input::post("username");
			$pass = input::post("password");
			$data = [$username,$pass];
			$user = $this->model->checkuser($data);
			$countuser = count($user) ?? 0;

			if($countuser>0){
					$this->session->set('SESS_USER_FULL_NAME',$user['full_name']);
					$this->session->set('SESS_USER_ID',$user['IDno']);
					$this->session->set('SESS_USER_TYPE',$user['userlevel']);
					$this->session->set('SESS_USER_NAME',$user['user_name']);
					$this->session->set('LAST_ACTIVITY',time());
				
					session_write_close();
			}
			echo $countuser;	
		}

		public function udpateUserinfo(){
			$idno = input::post('txtid');
			$name = input::post('txtName');
			$email = input::post('txtEmail');
			$level = input::post('txtLevel');

			$data = [$name,$email,$level,$idno];
			$res = $this->model->udpateUserinfo($data);

			if($res){
				$message = "<div class=\"alert alert-dismissible alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Successful!</div>";

				  session::set('message',$message);
				  $this->view->redirect('modify_user?idno='.urlencode($idno).'');
			}

		}

		public function removeUser(){
			$idno = input::post('txtid');
			$res = $this->model->removeUser($idno);

			if($res){
				$this->view->redirect('manage_user');
			}
		}

		public function update_password(){
				$old_pass = input::post('txtOld');
				$new_pass = input::post('txtNew');
				$renew_pass = input::post('txtRenew');
				$txtID = input::post('txtID');
				$username = input::post('txtUsername');

				if ($new_pass == $renew_pass) {

					if($old_pass != NULL){
						$res = $this->model->checkPasswordUser($txtID,$old_pass);
						$countexist = $res == NULL ? 0 : count($res);

						if($countexist > 0){
							$res = $this->model->updatePassword($new_pass,$txtID,$username);
							if($res){
								$message = "<div class=\"alert alert-dismissible alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Password Change Successful!</div>";
							}else{
								$message = "<div class=\"alert alert-dismissible alert-warning\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Something Went Wrong!</div>";
							}
							
						}else{
							$message = "<div class=\"alert alert-dismissible alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Wrong Password!</div>";

						}


					}else{

						if($new_pass != ""){
							$res = $this->model->updatePassword($new_pass,$txtID,$username);
							if($res){
								$message = "<div class=\"alert alert-dismissible alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Password Change Successful!</div>";
							}else{
								$message = "<div class=\"alert alert-dismissible alert-warning\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Something Went Wrong!</div>";
							}
						}else{
							$res = $this->model->updateUsername($txtID,$username);
							if($res){
								$message = "<div class=\"alert alert-dismissible alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Username Change Successful!</div>";
							}else{
								$message = "<div class=\"alert alert-dismissible alert-warning\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Something Went Wrong!</div>";
							}
						}
							

					}
					

				}else{
					$message = "<div class=\"alert alert-dismissible alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Password does not match the confirm password.</div>";

				}
				$data = ['message'=> $message];

				if($old_pass != NULL){
				$this->view->make('change_pass',$data);
				}else{
				 session::set('message',$message);
			    	$this->view->redirect('modify_user?idno='.urlencode($txtID).'');
				}
		}

		public function __destruct(){

		}

}