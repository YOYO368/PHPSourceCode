<?php

	require('../database/database.php');
	require('../database/carpark_query.php');
	
	$customerId= urldecode($_POST['customerId']);
	
	$result = getCarParkStatus($customerId);
	$numResults = mysqli_num_rows($result);

	$counter = 0;
	echo "[";	
	if ($result->num_rows > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			echo json_encode($row);
			if (++$counter != $numResults) {
				echo",";
			}
		}
	}
	echo "]";
?>