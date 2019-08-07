<?php
	/*$host = "localhost";
	$user = "root";
	$password = "";
	$database = "dbmiacarpark";*/
	$host = "us-cdbr-iron-east-02.cleardb.net";
	$database = "heroku_a26af63ef5ce9d3";
	$user = "b459e6bfc271b1";
	$password = "3ea494f1";

	$connection = mysqli_connect($host, $user, $password,$database);
	
	$Id = $_POST['adminId'];
    $Password = $_POST['adminPassword'];
	
	$query = "Select adminId, adminPassword from tbadmin where adminId = '" .$Id ."' and adminPassword = SHA1(UNHEX(SHA1('".$Password."')));";
		
	$result = mysqli_query($connection, $query);
	
	if ($result->num_rows > 0) {
		session_start();
		while($row = mysqli_fetch_row($result)) {
			$_SESSION['adminId'] = $row[0];
			$_SESSION['adminPassword'] = $row[1];
		}
		echo "true";
	}
	else {
		echo "false";
	}
?>