<?php

use base\Route;
use base\view;
use base\auth;
use helper\session;
use helper\input;

use controller\usercontroller;
use controller\homecontroller;
use controller\requirementcontroller;
use controller\profilecontroller;
use controller\loancontroller;

$view = new view;
$usercontroller = new usercontroller;
$homecontroller = new homecontroller;
$requirementcontroller = new requirementcontroller;
$profilecontroller = new profilecontroller;
$loancontroller = new loancontroller;


Route::make('index.php',function(){
	auth::RedirectifLog();
	exit;
});

Route::make('cpanel',function(){
	auth::checkAuth();
	$GLOBALS['homecontroller']->index();
	exit;
});

Route::make('logout',function(){
	auth::logout();
	exit;
});

Route::make('getpreviousdata',function(){
	auth::checkAuth();
	$GLOBALS['homecontroller']->getpreviousdata();
	exit;
});

Route::make('settings',function(){
	auth::checkAuth();
	$GLOBALS['view']->make('settings');
	exit;

});


Route::make('change_pass',function(){
	auth::checkAuth();
	$GLOBALS['view']->make('change_pass',['message'=>'']);
	exit;
});

Route::make('update_password',function(){
	auth::checkAuth();
	$GLOBALS['usercontroller']->update_password();
	exit;
});


Route::make('manage_user',function(){
	auth::checkAuth();
	$GLOBALS['usercontroller']->index();
	//$GLOBALS['view']->make('user/manage_user');
	exit;
});


Route::make('modify_user',function(){
	auth::checkAuth();
	$GLOBALS['usercontroller']->edit();
	exit;
});

Route::make('udpateUserinfo',function(){
	auth::checkAuth();
	$GLOBALS['usercontroller']->udpateUserinfo();
	exit;
});

Route::make('removeUser',function(){
	auth::checkAuth();
	$GLOBALS['usercontroller']->removeUser();
	exit;
});

Route::make('new_user',function(){
	auth::checkAuth();
	$GLOBALS['view']->make('user/create');
	exit;
});

Route::make('adduser',function(){
auth::checkAuth();
	$GLOBALS['usercontroller']->adduser();
	exit;
});




Route::make('manage_req',function(){
	auth::checkAuth();
	$GLOBALS['requirementcontroller']->index();
	exit;
});

Route::make('removeRequirement',function(){
	auth::checkAuth();
	$GLOBALS['requirementcontroller']->removeRequirement();
	exit;
});

Route::make('addRequirement',function(){
	auth::checkAuth();
	$GLOBALS['requirementcontroller']->addRequirement();
	exit;
});

Route::make('updateRequirement',function(){
	auth::checkAuth();
	$GLOBALS['requirementcontroller']->updateRequirement();
	exit;
});

Route::make('uploadRequirement',function(){
	auth::checkAuth();
	$GLOBALS['requirementcontroller']->uploadRequirement();
	exit;
});


Route::make('removeReqLoan',function(){
	auth::checkAuth();
	$GLOBALS['requirementcontroller']->removereq();
	exit;
});


Route::make('newBorrower',function(){
	auth::checkAuth();
	$GLOBALS['view']->make('profile/create');
	exit;
});

Route::make('newProfile',function(){
	auth::checkAuth();
	$GLOBALS['profilecontroller']->newProfile();
	exit;
});

Route::make('profile_list',function(){
	auth::checkAuth();
	$GLOBALS['profilecontroller']->index();
	exit;
});

Route::make('profile_details',function(){
	auth::checkAuth();
	$GLOBALS['profilecontroller']->profile_details();
	exit;
});



Route::make('updateProfile',function(){
	auth::checkAuth();
	$GLOBALS['profilecontroller']->updateProfile();
	exit;
});



Route::make('applyloan',function(){
	auth::checkAuth();
	$GLOBALS['loancontroller']->applyloan();
	exit;
});

Route::make('createLoan',function(){
	auth::checkAuth();
	$GLOBALS['loancontroller']->createLoan();
	exit;
});


Route::make('loan_list',function(){
	auth::checkAuth();
	$GLOBALS['loancontroller']->loan_list();
	exit;
});

Route::make('loanDetails',function(){
	auth::checkAuth();
	$GLOBALS['loancontroller']->loanDetails();
	exit;
});

Route::make('updateloan',function(){
	auth::checkAuth();
	$GLOBALS['loancontroller']->updateloan();
	exit;
});



Route::make('payment',function(){
	auth::checkAuth();
	$GLOBALS['loancontroller']->payment();
	exit;
});


Route::make('removepayment',function(){
	auth::checkAuth();
	$GLOBALS['loancontroller']->removepayment();
	exit;
});


Route::make('addpayment',function(){
	auth::checkAuth();
	$GLOBALS['loancontroller']->addpayment();
	exit;
});


Route::make('report_payment',function(){
	auth::checkAuth();
	$GLOBALS['loancontroller']->report_payment();
	exit;

});

Route::make('searchreportPayment',function(){
	auth::checkAuth();
	$GLOBALS['loancontroller']->searchreportPayment();
	exit;
});

Route::make('report_pastdue',function(){
	auth::checkAuth();
	$GLOBALS['loancontroller']->report_pastdue();
	exit;
});



Route::make('viewblog',function(){
	$blog = new blogcontroller;
	$blog->view();
	exit;
});

Route::make('add',function(){
	$blog = new blogcontroller;
 	$blog->add();
 	exit;
});

Route::make('login',function(){
	view::make("login");
	exit;
});

Route::make('checkuser',function(){
	$GLOBALS['usercontroller']->checkuser();
 	exit;
});

Route::make('remove',function(){
	$blog = new blogcontroller;
 	$blog->remove($_GET['idno']);
 	exit;
});

Route::make('addblog',function(){
	$blog = new blogcontroller;
	$blog->save();
	exit;
});

Route::make('about',function(){
	view::make("about");
	exit;
});

// if url is not in list, it will display this view
view::make('notexist');

