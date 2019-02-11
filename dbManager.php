<?php

	define("DB_TYPE", "mysql");
	define("DB_HOST", "localhost");
	define("DB_NAME", "fixallph_buildings");

	if(@file_get_contents(__DIR__."/localhost")){
		define("DB_USER", "root");
		define("DB_PASSWORD", "");
	}
	else{
		define("DB_USER", "fixallph_dbuser1");
		define("DB_PASSWORD", "123guraud!");
	}

	require_once __DIR__ . '/library/Mysql.php';
	
    $db = new Mysql();
    $db->exec("set names utf8");
    
    function verifyUser($_userName, $_userPass){
    	
    }
?>