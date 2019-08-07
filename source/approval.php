<?php 
	require('../database/database.php');
	require('../database/carpark_query.php'); 
	
	$carparkNo = $_POST["carparkNo"];
	$statusCode = $_POST["statusCode"];


	$result = updateCarParkStatus($carparkNo, $statusCode);

	echo $result;

?>