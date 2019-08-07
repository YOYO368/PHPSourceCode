<?php

	require('../database/database.php');
	require('../database/carpark_query.php');
	
	$customerId= urldecode($_POST['customerId']);
	$carparkNumber= urldecode($_POST['carparkNumber']);
	$requestDate= urldecode($_POST['requestDate']);
	$statusCode= urldecode($_POST['statusCode']);
	$updateDate= urldecode($_POST['updateDate']);
	
	$result = updateCarParkInfo($customerId,$carparkNumber,$requestDate,$statusCode,$updateDate);
	
	if($result == 1) {
		echo "{result:'success'}";
	}
	else {
		echo "{result:'fail'}";	
	}
?>