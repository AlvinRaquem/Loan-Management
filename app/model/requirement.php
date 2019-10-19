<?php

namespace model;
use base\model;

class requirement extends model {
	private $table = 'loan_tbl_requirementlist';

	public function getList(){
		$res = $this->select($this->table,['*'])
					->orderby('requirement')
					->get();
		return $res;
	}

	public function removeRequirement($idno){
		$res = $this->delete($this->table,[$idno])
					->where('idno = ?')
					->execute();
		return $res;
	}

	public function addRequirement($requirement){
		$res = $this->insert($this->table,['requirement'],[$requirement])
					->execute();
		return $res;
	}

	public function updateRequirement($data){
		$res = $this->update($this->table,['requirement'],$data)
					->where('idno = ?')
					->execute();
		return $res;
	}

	public function uploadRequirement($data){
		$columns = [
			'loanID',
			'requirementID',
			'DateSubmitted',
			'img',
		];

		$res = $this->insert('loan_requirements',$columns,$data)
					->execute();
		return $res;
	}

	public function removereq($data){
		$res = $this->delete('loan_requirements',$data)
					->where('loanID = ? AND requirementID = ?')
					->execute();
		return $res;
	}


}