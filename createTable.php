<?php

	include 'conn.php';
	//create the connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn -> connect_error){
		die("connection failed");
	}
	//create the table in the database
	$sql = "CREATE TABLE customerList (
		id int UNSIGNED AUTO_INCREMENT Primary Key,
		firstname varchar(30) NOT NULL,
		lastname varchar(30) NOT NULL,
		country varchar(30) NOT NULL,
		address varchar(60) NOT NULL
	)";

	if($conn -> query($sql) === TRUE){
		echo ("customerList table created successfully");
	}
	else{
		echo ("error occurred" .$conn -> error);
	}
	//Jump to the index page
	header("location: App.html");
	$conn -> close();
?>