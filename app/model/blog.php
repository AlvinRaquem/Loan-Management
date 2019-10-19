<?php

namespace model;
use base\model;

Class blog extends model {
	
	public function getAll($sql,$params = []){
		return $this->ExecuteQuery($sql);
	}

	public function getBlog($idno){
		$data = array($idno);
		$sql = "SELECT * FROM blog WHERE idno = ?";
		return $this->ExecuteQuery($sql,$data);
	}

	public function remove($id){
		$data = array($id);
		$sql = "DELETE FROM blog WHERE idno = ?";
		$blog = $this->ExcecuteNonQuery($sql,$data);
	}

	public function save($data){
		$sql = "INSERT INTO blog (title,body,datecreated) VALUES (?,?,?)";
		$blog = $this->ExcecuteNonQuery($sql,$data);
		
	}
}