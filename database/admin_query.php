<?php

	function getAdmin($adminId, $adminPassword) {
		global $connection;
		$query = "Select adminId, adminPassword from tbadmin where adminId = '" .$adminId ."' and adminPassword = '".$adminPassword."'";
		
		$result = mysqli_query($connection, $query);
		
		if($result == false) {
			 echo "error: " . mysqli_error($connection);
		}
		else
			echo "result $result";
		return $result;
	}
?>