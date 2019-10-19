<?php

namespace helper;

class session {

	public function __construct(){
		if(session_id()=="")
			session_start();
	}


	public function set($key,$val){
	  	$_SESSION[$key] = $val;
	}

	public function get($key){
		return $_SESSION[$key];
	}


	public function un_set($key){
		 unset($_SESSION[$key]);
	}


	public function destroy(){
		return session_destroy();
	}

}