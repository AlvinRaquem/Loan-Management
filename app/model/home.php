<?php

namespace model;
use base\model;
use model\profile;

Class home extends model {

	private $table = 'loan_tbl_loan';
	protected $profile;

	public function __construct(){
		parent::__construct();
		$this->profile = new profile;
	}
	
	public function getpreviousdata(){
		$dayname = array();
		$datacount = array();
		$fields = ['DepositDate as dayname','count(*) as records'];
		$row = $this->select('loan_tbl_data',$fields)
					->where('DATE(DepositDate) BETWEEN DATE(NOW() - INTERVAL 7 DAY) AND DATE(NOW() - INTERVAL 1 DAY)')
					->groupby('DATE(DepositDate)')
					->get();

		$rescount = count($row) ?? 0;

		if($rescount > 0){
			  $day = $row['dayname'];
		      $dayname[] = $day;
		      $datacount[]=intval($row['records']);
		}else{
			 $dayname[] = '';
 			 $datacount[] = 0;
		}

		$row = $this->select($this->table,['COUNT(*) as loancount'])
					->get();
		$systemuser = $row[0]['loancount'];

		$row = $this->select($this->table,['COUNT(*) as loancount'])
					->where("type='Motorcycle'")
					->get();
		$usersID = $row[0]['loancount'];

		$row = $this->select($this->table,['COUNT(*) as loancount'])
					->where("type='Personal'")
					->get();
		$departments = $row[0]['loancount'];

		$profiles = $this->profile->getProfiles();

		$profile = $profiles != NULL ? count($profiles) : 0;


		$row = $this->select('loan_tbl_payment',['MONTH(createdDate) as monthdes','sum(amount) as payment'])
					->where('YEAR(createdDate) = YEAR(NOW()) AND isDelete = 0')
					->groupby('MONTH(createdDate)')
					->orderby('MONTH(createdDate)')
					->get();

		$dashboarddata = $row;

		$displayarray = [0,0,0,0,0,0,0,0,0,0,0,0];

		foreach($dashboarddata as $dashboard){
		$displayarray[$dashboard['monthdes']-1] = (float)$dashboard['payment'];
		}


		$data = array(
			'dayname' => $dayname,
			'datacount' => $datacount,
			'systemuser' => $systemuser,
			'userID' => $usersID,
			'profile' => $profile,
			'department' => $departments,
			'displayarray' => $displayarray,
		);

		return $data;



	}
}