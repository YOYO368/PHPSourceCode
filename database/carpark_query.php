<?php

	function insertCarParkInfo($customerId, $carparkNumber,$requestDate, $statusCode) {
		global $connection;
		$query = "Insert into tbcarparkinfo(customerId, carparkNumber, requestDate, statusCode) values('$customerId', '$carparkNumber', '$requestDate', '$statusCode', NOW());";
		
		$result = mysqli_query($connection, $query);

		if($result == false) {
			 echo "error: " . mysqli_error($connection);
		}
		return $result;
	}

	function getCarParkInfo($customerId) {
		global $connection;
		$query = "Select MAX(taskSeqNo) taskSeqNo from tbcarparkinfo where customerId = '$customerId';";
		
		$result = mysqli_query($connection, $query);

		if($result == false) {
			 echo "error: " . mysqli_error($connection);
		}
		return $result;
	}
	function getCarParkStatus($customerId) {
		global $connection;
		$query = "Select carparkNumber, statusCode from tbcarparkinfo where customerId = '$customerId';";
		
		$result = mysqli_query($connection, $query);

		if($result == false) {
			 echo "error: " . mysqli_error($connection);
		}
		return $result;
	}
	
	function getCarParkList($startPageNum, $rowCount) {
		global $connection;
		$query = "Select customerId,carparkNumber,requestDate,statusCode, updateDate from tbcarparkinfo LIMIT ".$startPageNum.", ".$rowCount.";";
		$result = mysqli_query($connection, $query);

		if($result == false) {
			 echo "error: " . mysqli_error($connection);
		}
		return $result;
	}
	
	function getCarParkEmptyList($startPageNum, $rowCount) {
		global $connection;
		$query = "Select carparkNumber,statusCode, updateDate from tbcarparkinfo WHERE statusCode = 'A_001';";
		$result = mysqli_query($connection, $query);

		if($result == false) {
			 echo "error: " . mysqli_error($connection);
		}
		return $result;
	}
	function getPakingAreaList($status) {
		global $connection;
		$query = "Select carparkNumber from tbcarparkinfo WHERE statusCode = '$status';";
		$result = mysqli_query($connection, $query);

		if($result == false) {
			 echo "error: " . mysqli_error($connection);
		}
		return $result;
	}

	function updateCarParkInfo($customerId, $carparkNumber,$requestDate, $statusCode,$updateDate) {
		global $connection;
		$query = "UPDATE tbcarparkinfo SET customerId = '".$customerId."',requestDate = '".$requestDate."', statusCode = '".$statusCode."',updateDate = '".$updateDate."'WHERE carparkNumber = '".$carparkNumber."';";
		
		$result = mysqli_query($connection, $query);

		if($result == false) {
			 echo "error: " . mysqli_error($connection);
		}
		return $result;
	}
	
	function updateCarParkStatus($carparkNo,$statusCode) {
		global $connection;
		$query = "UPDATE tbcarparkinfo SET statusCode = '".$statusCode."',updateDate = NOW() WHERE carparkNumber = '".$carparkNo."';";
		
		$result = mysqli_query($connection, $query);

		if($result == false) {
			 echo "error: " . mysqli_error($connection);
		}
		return $result;
	}

	function deleteCarParkInfo($customerId) {
		global $connection;
		$query = "Delete from tbcarparkinfo where customerId=$customerId;";
		
		$result = mysqli_query($connection, $query);

		if($result == false) {
			 echo "error: " . mysqli_error($connection);
		}
		return $result;

	}

?>