<?php
namespace model;
use base\model;

class profile extends model {

	private $table = 'loan_tbl_personalinfo';

	public function getProfiles(){
		$res = $this->select($this->table." tprofile",['*','(SELECT COUNT(*) FROM loan_tbl_loan tloan WHERE tloan.idno = tprofile.idno) as loancount'])
					->orderby('surname')
					->get();
		return $res;
	}

	public function profile_details($idno){
		$res = $this->select($this->table,['*'],[$idno])
					->where('idno = ?')
					->first();
		return $res;
	}

	public function profile_history($idno){
		$res = $this->select('loan_tbl_loan',['*'],[$idno])
					->where('idno = ?')
					->get();
		return $res;
	}

	public function updateProfile($data){
		$columns = [
			'firstname',
			'middlename',
			'surname',
			'permanentAddress',
			'permanentOwnership',
			'permanentYears',
			'provinceAdd',
			'provinceOwnership',
			'provinceYears',
			'homeLandline',
			'mobileNos',
			'emailAdd',
			'dateBirth',
			'placeBirth',
			'gender',
			'nationality',
			'educational',
			'educationalOther',
			'residency',
			'civilStatus',
			'noChildren',
			'agesChildren',
			'tinNo',
			'sssNo',
			 'otherID', 
			 'employerName',
			 'employerAdd', 
			 'employerLandline', 
			 'employerPosition', 
			 'employerRank', 
			 'employerYrsService', 
			 'employerGross', 
			 'employerBenefits', 
			 'employerSuperior', 
			 'selfBusinessName', 
			 'selfBusinessType', 
			 'selfBusinessNature', 
			 'selffBussinessAddress', 
			 'selfBusinessTelephone', 
			 'selfBusinessPosition', 
			 'selfBusinessOperation', 
			 'selfBusinessGross', 
			 'selfBusinessNet', 
			 'selfBusinessOtherIncome', 
			 'spouseName', 
			 'spouseBirth', 
			 'spouseChildren', 
			 'spouseEmployer', 
			 'spouseAddress', 
			 'spousePosition', 
			 'spouseRank', 
			 'spouseGross', 
			 'spouseOfcNo', 
			 'spouseLandline', 
			 'spouseEmail', 
			 'spouseSSS', 
			 'spouseTin', 
			 'coName', 
			 'coAddress', 
			 'coContactNos', 
			 'coDateBirth', 
			 'coTinNo', 
			 'coSSother', 
			 'coStatus', 
			 'coRelationship', 
			 'coEmployerName', 
			 'coEmployerAdd', 
			 'coEmployerLandline', 
			 'coEmployerPosition', 
			 'coEmployerRank', 
			 'coEmployerService', 
			 'coEmployerGross', 
			 'coEmployerBenefits', 
			 'coSelfName', 
			 'coSelfType', 
			 'coSelfNature', 
			 'coSelfAddress', 
			 'coSelfTelephone', 
			 'coSelfPosition', 
			 'coSelfOperation', 
			 'coSelfAnnual', 
			 'coSelfNet', 
			 'coSelfOtherIncome',
			 'img',

		];

		$res = $this->update($this->table,$columns,$data)
					->where('idno = ?')
					->execute();
		return $res;
	}

	public function newProfile($data){

		$columns = [
			'firstname',
			'middlename',
			'surname',
			'permanentAddress',
			'permanentOwnership',
			'permanentYears',
			'provinceAdd',
			'provinceOwnership',
			'provinceYears',
			'homeLandline',
			'mobileNos',
			'emailAdd',
			'dateBirth',
			'placeBirth',
			'gender',
			'nationality',
			'educational',
			'educationalOther',
			'residency',
			'civilStatus',
			'noChildren',
			'agesChildren',
			'tinNo',
			'sssNo',
			 'otherID', 
			 'employerName',
			 'employerAdd', 
			 'employerLandline', 
			 'employerPosition', 
			 'employerRank', 
			 'employerYrsService', 
			 'employerGross', 
			 'employerBenefits', 
			 'employerSuperior', 
			 'selfBusinessName', 
			 'selfBusinessType', 
			 'selfBusinessNature', 
			 'selffBussinessAddress', 
			 'selfBusinessTelephone', 
			 'selfBusinessPosition', 
			 'selfBusinessOperation', 
			 'selfBusinessGross', 
			 'selfBusinessNet', 
			 'selfBusinessOtherIncome', 
			 'spouseName', 
			 'spouseBirth', 
			 'spouseChildren', 
			 'spouseEmployer', 
			 'spouseAddress', 
			 'spousePosition', 
			 'spouseRank', 
			 'spouseGross', 
			 'spouseOfcNo', 
			 'spouseLandline', 
			 'spouseEmail', 
			 'spouseSSS', 
			 'spouseTin', 
			 'coName', 
			 'coAddress', 
			 'coContactNos', 
			 'coDateBirth', 
			 'coTinNo', 
			 'coSSother', 
			 'coStatus', 
			 'coRelationship', 
			 'coEmployerName', 
			 'coEmployerAdd', 
			 'coEmployerLandline', 
			 'coEmployerPosition', 
			 'coEmployerRank', 
			 'coEmployerService', 
			 'coEmployerGross', 
			 'coEmployerBenefits', 
			 'coSelfName', 
			 'coSelfType', 
			 'coSelfNature', 
			 'coSelfAddress', 
			 'coSelfTelephone', 
			 'coSelfPosition', 
			 'coSelfOperation', 
			 'coSelfAnnual', 
			 'coSelfNet', 
			 'coSelfOtherIncome',
			 'img',

		];


		$res = $this->insert($this->table,$columns,$data)
					->execute();
		return $res;
	
	}
}