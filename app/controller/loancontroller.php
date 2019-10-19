<?php

namespace controller;

use base\controller;
use model\loan;
use model\requirement;
use helper\session;
use helper\input;

Class loancontroller extends controller {

	private $requirement;

	public function __construct(){
		parent::__construct(new loan);
		$this->requirement = new requirement;
	}

	public function applyloan(){
		$profileID = input::get('idno');

		$this->view->make('loan/create');
	}

	public function loan_list(){
		$loans = $this->model->loan_list();
		

		$this->view->make('loan/list',['loans'=>$loans]);
	}

	public function loanDetails(){
		$loanid = input::get('loanID');

		$details = $this->model->loanDetails($loanid);
		$requirements = $this->requirement->getList();

		$this->view->make('loan/details',['loan'=>$details,'requirements'=>$requirements]);


	}

	public function report_payment(){

		$data = $this->model->report_payment();

		$this->view->make('report/payment',['reports'=>$data]);
	}

	public function searchreportPayment(){
		$searchfield = input::post('txtSearch');
		$datefrom = input::post('dateFrom');
		$dateto = input::post('dateTo');
		$data = $this->model->searchreportPayment($searchfield,$datefrom,$dateto);
		$this->view->make('report/payment',['reports'=>$data]);
	}

	public function report_pastdue(){
		$data=$this->model->report_pastdue();
		$this->view->make('report/pastdue',['reports'=>$data]);
	}

	public function payment(){
		$refno = input::get('RefNo');

		$res = $this->model->payment($refno);
		$this->view->make('loan/payment',['loan'=>$res]);
	}

	public function removepayment(){
		$refno = input::post('refno');
		$amount = input::post('amount');
		$loanid = input::post('loanid');
		$reason = input::post('reason');
		$balance = input::post('balance');
		$res = $this->model->removepayment($refno,$amount,$loanid,$reason,$balance);

		$response = $res ? 1 : 0;
		echo $response;
	}

	public function addpayment(){
	  $refno = input::post('refno');
	  $idno = input::post('idno');
	  $ornumber = input::post('ornumber');
	  $ordate = input::post('ordate');
	  $remark = input::post('remark');
	  $oramount = input::post('oramount');
	  $bank = input::post('bank');
	  $particular = input::post('particular');
	  $principal = input::post('principal');
	  $interest = input::post('interest');
	  $paymonth = input::post('paymonth');
	  $dst = input::post('dst');
	  $insurance = input::post('insurance');
	  $penalty = input::post('penalty');
	  $total = input::post('total');
	  $created = $_SESSION['SESS_USER_FULL_NAME']; 
	  $dateCreated = date("Y-m-d H:i");
	  $balance = input::post('txtBalance');
	  $loanType = input::post('loanType');

	  $balance = $balance - $oramount; 

	  $paymentData = [
	   $refno,
	   $idno,
	   $ornumber,
	   $ordate,
	   $remark,
	   $oramount,
	   $bank,
	   $particular,
	   $principal,
	   $interest,
	   $paymonth,
	   $dst,
	   $insurance,
	   $penalty,
	   $total,
	   $created,
	   $dateCreated,
	   $loanType

	  ];

	  $loanData = [
	  	$balance,
	  	$dateCreated,
	  	$refno,
	  ];

	  $res = $this->model->addpayment($paymentData,$loanData);

	  $response = $res ? 1 : 0;

	   $message = $response == 1 ? "<div class=\"alert alert-dismissible alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Payment has been added</div>" : "<div class=\"alert alert-dismissible alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Something went wrong.</div>";
		session::set('message',$message);
		
		$this->view->redirect('payment?RefNo='.$refno.'');
	  
	 
	}

	public function updateloan(){
		$idno = input::post('txtidno');
		$dateloan = input::post('txtLoanDate') != "" ? input::post('txtLoanDate') : "0000-00-00";
		$typeloan = input::post('typeloan'); 
		//$typeOthers = input::post('typeOthers');
		$txtPurpose = input::post('txtPurpose');
		$txtAmount = input::post('txtAmount');
		$txtTerms = input::post('txtTerms');
		$txtInterest = input::post('txtInterest');
		$txtPayment = input::post('txtPayment');
		//$txtDocs = input::post('txtDocs');
		$txtDocsReq = input::post('txtDocsReq');
		$txtDocResult = input::post('txtDocResult');
		$txtciRemarks = input::post('txtciRemarks');
		$txtciResult= input::post('txtciResult');
		$txtVoucherNo = input::post('txtVoucherNo');
		$txtVoucherBook = input::post('txtVoucherBook');
		$txtAmountReleased = input::post('txtAmountReleased') != "" ?  input::post('txtAmountReleased') : 0;
		$dateReleased = input::post('dateReleased') != "" ? input::post('dateReleased') : "0000-00-00";
		$voucherStatus= input::post('voucherStatus');

		$startPay =input::post('startPay') != "" ? input::post('startPay') : "0000-00-00";

		$interestrate = ($txtInterest / 100);
		//$interestIncome = (floatval($txtAmount) * floatval($interestrate) * floatval($termMonth));
		$interestIncome = $txtAmount * $interestrate;
		$interestIncome = $interestIncome * $txtTerms;
		$ttlAmount = $txtAmount + $interestIncome;
		$montlyPayment = $ttlAmount / $txtTerms;
		$applicationStat  = $voucherStatus == "RELEASED" ? "1" : "0";
		
		$data = [
	
		$dateloan ,
		$typeloan,
		//$typeOthers ,
		$txtPurpose,
		$txtAmount,
		$txtTerms ,
		$txtInterest ,
		$txtPayment ,
		$ttlAmount ,
		$interestIncome ,
		$montlyPayment ,
		//$txtDocs,
		$txtDocsReq,
		$txtDocResult ,
		$txtciRemarks,
		$txtciResult , 
		$txtVoucherNo,
		$txtVoucherBook,
		$txtAmountReleased,
		$dateReleased,
		$voucherStatus,
		$applicationStat,
		// $ttlAmount,
		$startPay,
		$idno ,
		];

		$res = $this->model->updateloan($data);

		$response = $res > 0 ? 1 : 0;

		$message = $response == 1 ? "<div class=\"alert alert-dismissible alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Ref: ".$idno." Loan has been udpated.</div>" : "<div class=\"alert alert-dismissible alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Something went wrong.</div>";
		session::set('message',$message);
		$this->view->redirect('loanDetails?loanID='.$idno.'');
	}

	public function checkstatusRequirement($loanid,$requirementID){
		$data = $this->model->checkstatusRequirement([$loanid,$requirementID]);

		return $data;
	}

	public function paymentdata($loanid,$balance,$strLoanMonth,$loanstatus){
		  $remarks = "";
		  $classrow = "info";
		  if($loanstatus == 1){
		  $payment = $this->model->paymentdata($loanid);
		  $dMonth = date("m");
          $dYear = date('Y');
		  $lastPay = strtotime($payment['paymonth']);
          $strMonth = date('m', $lastPay);
          $strYr = date('Y', $lastPay);
            if($dYear == $strYr){
                	if($balance > 0){
                		$mDiff = $dMonth - $strMonth;
                			if($mDiff == 0){
                				$classrow = "success";
                				$remarks = "last pay ".$strMonth."-".$strYr;
                			}else{
                				if($mDiff == 1){
                					$classrow = "warning";
                					$remarks = "due date";
                				}else{
                					if($strLoanMonth>$dMonth){
                						$classrow = "";
                						$remarks = "";
                					}else{
                						$classrow = "danger";
                						$remarks = "overdue";
                					}
                				}
                			}
                	}else{
                		$classrow = "";
                		$remarks = "closed";
                	}
            }else{
            	if($balance > 0){
            		$mDiff = $dMonth - $strLoanMonth;
            		if($mDiff == 0){
            			$classrow = "warning";
            			$remarks = "due date";
            		}elseif($mDiff > 0){
            			$classrow = "danger";
            			$remarks = "overdue";
            		}else{
            		    $classrow = "";
                		$remarks = "";
            		}
            	}else{
        			$classrow = "";
            		$remarks = "closed";
            	}
            }
        }
		return [$classrow,$remarks];
	}

	public function getPayments($refno,$status){
			$res = $this->model->getPayments($refno,$status);

			return $res;
	}

	public function createLoan(){
		$idno = input::post('txtidno');
		$dateloan = input::post('txtLoanDate');
		$typeloan = input::post('typeloan'); 
		$typeOthers = input::post('typeOthers');
		$txtPurpose = input::post('txtPurpose');
		$txtAmount = input::post('txtAmount');
		$txtTerms = input::post('txtTerms');
		$txtInterest = input::post('txtInterest');
		$txtPayment = input::post('txtPayment');
		$txtDocs = input::post('txtDocs');
		$txtDocsReq = input::post('txtDocsReq');
		$txtDocResult = input::post('txtDocResult');
		$txtciRemarks = input::post('txtciRemarks');
		$txtciResult= input::post('txtciResult');
		$txtVoucherNo = input::post('txtVoucherNo');
		$txtVoucherBook = input::post('txtVoucherBook');
		$txtAmountReleased = input::post('txtAmountReleased');
		$dateReleased = input::post('dateReleased');
		$voucherStatus= input::post('voucherStatus');

		$startPay =input::post('startPay');

		$interestrate = ($txtInterest / 100);
		//$interestIncome = (floatval($txtAmount) * floatval($interestrate) * floatval($termMonth));
		$interestIncome = $txtAmount * $interestrate;
		$interestIncome = $interestIncome * $txtTerms;
		$ttlAmount = $txtAmount + $interestIncome;
		$montlyPayment = $ttlAmount / $txtTerms;
		$applicationStat = "0";
		
		$data = [
		$idno ,
		$dateloan ,
		$typeloan,
		$typeOthers ,
		$txtPurpose,
		$txtAmount,
		$txtTerms ,
		$txtInterest ,
		$txtPayment ,
		$ttlAmount ,
		$interestIncome ,
		$montlyPayment ,
		//$txtDocs,
		//$txtDocsReq,
		//$txtDocResult ,
		//$txtciRemarks,
		//$txtciResult , 
		//$txtVoucherNo,
		//$txtVoucherBook,
		//$txtAmountReleased,
		//$dateReleased,
		//$voucherStatus,
		$applicationStat,
		$ttlAmount,
		//$startPay,
		];

		$res = $this->model->createLoan($data);

		$response = $res > 0 ? 1 : 0;

		$message = $response == 1 ? "<div class=\"alert alert-dismissible alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Ref: ".$res." Loan has been created. <a href='loanDetails?loanID=".$res."'>GO TO DETAILS</a></div>" : "<div class=\"alert alert-dismissible alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Something went wrong.</div>";
		session::set('message',$message);
		$this->view->redirect('applyloan?idno='.$idno.'');
	}


}