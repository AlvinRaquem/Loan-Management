<?php

namespace model;
use base\model;

Class loan extends model {

	private $table = 'loan_tbl_loan';

	public function loan_list(){
		$res = $this->select($this->table." a",['a.*','b.firstname', 'b.middlename', 'b.surname', 'b.employerName', 'b.selfBusinessName'])
					->leftjoin('loan_tbl_personalinfo b','a.idno','b.idno')
					->orderby('a.refno')
					->get();
		return $res;
	}

	public function generateSQL($sql){
		$res = $this->rawQuery($sql);
		return $res;
	}

	public function getPayments($refno,$status){
		$res = $this->select('loan_tbl_payment',['*'],[$refno,$status])
					->where('refno = ? AND isDelete = ?')
					->get();
		return $res;
	}

	public function removepayment($refno,$amount,$loanid,$reason,$balance){
		$lastmodifiedby = $_SESSION['SESS_USER_FULL_NAME'];
		$lastmodifieddate = date('Y-m-d H:i:s',time());
		$lastPay = date('Y-m-d',time());
		$updatebalance = $balance+$amount;

		$loandata = [$amount,$lastPay,$loanid];

		try{
		$res = $this->update($this->table,['balance','lastPay'],[$updatebalance,$lastPay,$loanid])
					->where('refno = ?')
					->execute();

		$res = $this->update('loan_tbl_payment',['isDelete','LastModifiedby','LastModifiedDate','reason'],[1,$lastmodifiedby,$lastmodifieddate,$reason,$refno])
					->where('payid = ?')
					->execute();

		return $res;

		}catch(Exception $e){
			echo $e->getMessage();
		}

	}

	public function report_pastdue(){
			$sql = "SELECT a.refno, a.idno, b.firstname, b.middlename, b.surname, b.employerName, b.selfBusinessName, a.type, a.ttlAmount, a.loanAmount, a.payment, a.montlyPayment,  a.requirementResult, a. ciResult, a.voucherStatus, a.dateloan, a.status, a.startPay, a.balance FROM loan_tbl_loan a LEFT JOIN loan_tbl_personalinfo b ON a.idno = b.idno  WHERE a.status='1' AND balance > 0 ORDER BY a.refno ASC";

			$res = $this->rawQuery($sql);
			return $res;
	}

	public function searchreportPayment($searchName,$date1,$date2){
		$sql = "SELECT a.payid, a.refno, a.idno, a.ornumber, a.ordate, a.amount, a.remarks, a.particulars, a.bank, a.principal, a.interest, a.loantype, a.paymonth, a.dst, a.insurance, a.penalty, a.total, a.created, a.createdDate, b.firstname, a.isDelete, b.middlename, b.surname FROM loan_tbl_payment a LEFT JOIN loan_tbl_personalinfo b ON a.idno=b.idno WHERE a.isDelete='0'";

					
			if ($searchName <>"") {

			
				$sql = $sql." and (a.payid LIKE '%".$searchName."%' OR a.refno LIKE '%".$searchName."' OR a.idno LIKE '%".$searchName."%' OR a.ornumber LIKE '%".$searchName."%' OR a.remarks LIKE '%".$searchName."%' OR b.firstname LIKE '%".$searchName."%' OR b.surname LIKE '%".$searchName."%')"; 
				if ($date1<>"" || $date2<>"") {
					$sql = $sql. " AND (a.ordate BETWEEN '".$date1."' AND '".$date2."' ORDER BY a.payid DESC)";  											
				} else {
					$sql = $sql. " ORDER BY a.payid DESC";	
				}	
				
			} else {
				
				if ($date1<>"" || $date2<>"") {
					$sql = $sql. " AND a.ordate BETWEEN '".$date1."' AND '".$date2."' ORDER BY a.payid DESC";  											
				} else {
					$sql = $sql. " ORDER BY a.payid DESC";	
				} 	
			}

			$res = $this->rawQuery($sql);

			return $res;
										
	}

	public function report_payment(){
		$columns = [
			'a.payid', 
			'a.refno', 
			'a.idno', 
			'a.ornumber', 
			'a.ordate', 
			'a.amount', 
			'a.remarks', 
			'a.particulars', 
			'a.bank', 
			'a.principal', 
			'a.interest', 
			'a.loantype', 
			'a.paymonth', 
			'a.dst', 
			'a.insurance', 
			'a.penalty', 
			'a.total', 
			'a.created', 
			'a.createdDate', 
			'b.firstname', 
			'a.isDelete', 
			'b.middlename', 
			'b.surname'
		];
		$res = $this->select('loan_tbl_payment a',$columns)
					->leftjoin('loan_tbl_personalinfo b','a.idno','b.idno')
					->where('a.isDelete = 0')
					->orderby('a.payid','DESC')
					->get();

		return $res;
	}

	public function addpayment($paymentData,$loanData){
			$paymentcolumnns = [
				'refno',
				'idno',
				'ornumber',
				'ordate',
				'remarks',
				'amount', 
				'bank', 
				'particulars', 
				'principal', 
				'interest', 
				'paymonth', 
				'dst', 
				'insurance', 
				'penalty', 
				'total', 
				'created', 
				'createdDate', 
				'loantype',
			];

			$loancolumns = [
				'balance',
				'lastPay',
			];


			try {
				$res = $this->insert('loan_tbl_payment',$paymentcolumnns,$paymentData)
							->execute();

				$res = $this->update($this->table,$loancolumns,$loanData)
							->where('refno = ?')
							->execute();

				return $res;

							
			}catch(Exception $e){
				echo $e->getMessage();
			}


	}

	public function paymentdata($loanid){
		$payment = $this->select('loan_tbl_payment',['paymonth'],[$loanid])
						->where('refno = ? AND isDelete = 0')
						->orderby('paymonth','DESC')
						->last();
		return $payment;
	}

	public function loanDetails($id){
			$res = $this->select($this->table." a",['a.*','b.firstname', 'b.middlename', 'b.surname', 'b.employerName', 'b.selfBusinessName'],[$id])
					->leftjoin('loan_tbl_personalinfo b','a.idno','b.idno')
					->where('a.refno = ?')
					->orderby('a.refno')
					->get();

			return $res;
	}

	public function payment($refno){
		$res = $this->select($this->table." a",['a.*','CONCAT(b.firstname," ",b.middlename, " ",b.surname) as fullname'],[$refno])
					->leftjoin('loan_tbl_personalinfo b','a.idno','b.idno')
					->where('a.refno = ?')
					->first();
		return $res;
	}

	public function checkstatusRequirement($data){
		$res = $this->select('loan_requirements',['*'],$data)
					->where('loanID =? AND requirementID = ?')
					->first();
	   return $res;
	}

	public function updateloan($data){
		$columns = [
				'dateloan', 
				'type', 
				//'typeOthers', 
				'purpose', 
				'loanAmount', 
				'termMonth', 
				'interest', 
				'payment', 
				'ttlAmount', 
				'interestIncome', 
				'montlyPayment', 
			    //'requirementDocs', 
				'requirementRemarks', 
				'requirementResult', 
				'ciRemarks', 
				'ciResult', 
				'voucherNo', 
				'bookingNo', 
				'amountReleased', 
				'dateReleased', 
				'voucherStatus', 
				'status', 
				//'balance', 
				'startPay',
			];

			$res = $this->update($this->table,$columns,$data)
						->where('refno = ?')
						->execute();
			return $res;

	}


	public function createLoan($data){

			$columns = [
				'idno', 
				'dateloan', 
				'type', 
				'typeOthers', 
				'purpose', 
				'loanAmount', 
				'termMonth', 
				'interest', 
				'payment', 
				'ttlAmount', 
				'interestIncome', 
				'montlyPayment', 
				//'requirementDocs', 
				//'requirementRemarks', 
				//'requirementResult', 
				//'ciRemarks', 
				//'ciResult', 
				//'voucherNo', 
				//'bookingNo', 
				//'amountReleased', 
				//'dateReleased', 
				//'voucherStatus', 
				'status', 
				'balance', 
				//'startPay',
			];

			$res = $this->insert($this->table,$columns,$data)
						->execute();
			return $this->getLastID();

	}

}