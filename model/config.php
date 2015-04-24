<?php

	require_once(__DIR__ . "/database.php");

	//require_once(__DIR__ . "/date.php");


	// session preserve or save information that way we can use it over and over
	session_start();
	session_regenerate_id(true);


    $path = "/TO-DO2/";

    // store variables 
	$host     =  "localhost";
	$username =  "root";
	$password =  "root";
	$database =  "todo2.0";

	// use isset to determine whether or not a variable has a value
	// has been set or not
	if (!isset($_SESSION["connection"])) {

		// create a new database object call $connection
		$connection = new Database($host, $username, $password, $database);

		
		$_SESSION["connection"] = $connection;
     }