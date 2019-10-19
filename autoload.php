<?php


spl_autoload_register(function($class){
	if(file_exists(APP_PATH.$class.".php")){
		require APP_PATH.$class.".php";
	}else if(file_exists(BASE_PATH.$class.".php")){
		require BASE_PATH.$class.".php";
	}
});


