<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	require('../database/database.php');
	require('../database/customer_query.php');
	
	$Id = $_POST["customerId"];

	$result = getCustomerId($Id);
	
	if ($result->num_rows > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			echo json_encode($row);
			
		}
	}
}
?>