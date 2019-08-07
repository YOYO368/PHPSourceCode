<?php
	require('../database/database.php');
	require('../database/customer_query.php');

	$userId = $_POST['userId'];
	$userPassword = $_POST['userPassword'];

	$userInfo = getUser($userId, $userPassword);
	if ($userInfo->num_rows > 0) {
		session_start();
		while($row = mysqli_fetch_row($userInfo)) {
			$_SESSION['userId'] = $row[0];
			$_SESSION['userPassword'] = $row[1];
		}
		echo "true";
	}
	else {
		echo "false";
	}
?>