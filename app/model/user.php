<?php
namespace model;
use base\model;

class user extends model {

	private $table = 'loan_tb_user';

	public function getUsers(){
		$fields = ['*'];
		$res = $this->select($this->table,$fields)
					->orderby('full_name')
					->get();
		return $res;
	}

	public function getUser($idno){
		$data = [$idno];
		$res = $this->select($this->table,['*'],$data)
					->where('idno = ?')
					->first();
		return $res;
	}

	public function checkuser($data){
		$fields = ['*'];
		$res = $this->select($this->table,$fields,$data)
					->where("user_name = ? AND pass_word = ?")
					->first();
		return $res;
	}

	public function checkPasswordUser($idno,$pass){
		$data = [$pass,$idno];
		$res = $this->select($this->table,['*'],$data)
					->where('pass_word = ? AND idno = ?')
					->first();
		return $res;
	}

	public function updatePassword($pass,$idno,$username){
		$data = [$pass,$username,$idno];
		$columns = ['pass_word','user_name'];
		$res = $this->update($this->table,$columns,$data)
					->where('idno = ?')
					->execute();
		return $res;
	}

	public function updateUsername($idno,$username){
		$data = [$username,$idno];
		$columns = ['user_name'];
		$res = $this->update($this->table,$columns,$data)
					->where('idno = ?')
					->execute();
		return $res;
	}

	public function udpateUserinfo($data){

		$columns = ['full_name','email_add','userlevel'];
		$res = $this->update($this->table,$columns,$data)
					->where('idno = ?')
					->execute();
		return $res;
	}

	public function removeUser($idno){
		$data = [$idno];
		$res = $this->delete($this->table,$data)
					->where('idno = ?')
					->execute();
		return $res;
	}

	public function checkduplicate($username){
		$res = $this->select($this->table,['*'],[$username])
					->where('user_name = ?')
					->first();
		return $res;
	}

	public function adduser($data){
		$columns = ['full_name','email_add','userlevel','user_name','pass_word'];
		$res = $this->insert($this->table,$columns,$data)
					->execute();
		return $res;
	}
}