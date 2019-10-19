<?php

namespace helper;

Class input {


	public function get($var){
		return isset($_GET[$var]) ? $_GET[$var] : null;
	}

	public function post($var){
		return isset($_POST[$var]) ? $_POST[$var] : null;
	}


}