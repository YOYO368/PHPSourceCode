<?php

	require('../database/database.php');
	require('../database/customer_query.php');
	
	$userId = urldecode($_POST['userId']);
	$userPassword = urldecode($_POST['userPassword']);

	$result = getUser($userId, $userPassword);
	$numResults = mysqli_num_rows($result);

	if($numResults > 0) {
		echo "{result:'success'}";
	}
	else {
		echo "{result:'fail'}";
	}



?>