<?php

	function getCustomerInfo($startPageNum, $rowCount) {
		global $connection;
		$query = "Select customerId, customerPassword, firstName, lastName, email,phoneNumber from tbcustomer LIMIT ".$startPageNum.", ".$rowCount.";";
		
		$result = mysqli_query($connection, $query);

		if($result == false) {
			 echo "error: " . mysqli_error($connection);
		}
		return $result;
	}
	function getUser($userId, $userPassword) {
		global $connection;
		$query = "Select customerId , customerPassword from tbcustomer where customerId = '" .$userId ."' and customerPassword = SHA1(UNHEX(SHA1('".$userPassword."')));";
		
		$result = mysqli_query($connection, $query);

		if($result == false) {
			 echo "error: " . mysqli_error($connection);
		}
		return $result;
	}
	
	function registerCustomer($customerId, $customerPassword, $firstName, $lastName, $email, $phoneNumber) {
		global $connection;
		$query = "Insert into tbcustomer(customerId, customerPassword, firstName, lastName, email, phoneNumber) values('$customerId', SHA1(UNHEX(SHA1('$customerPassword'))), '$firstName', '$lastName','$email','$phoneNumber');";

		$result = mysqli_query($connection, $query);

		if($result == false) {
			 echo "error: " . mysqli_error($connection);
		}
		return $result;
	}

	function getCustomerId($customerId) {
		global $connection;
		$query = "Select count(customerId) customerIdCount from tbcustomer where customerId = '$customerId';";
		$result = mysqli_query($connection, $query);

		if($result == false) {
			 echo "error: " . mysqli_error($connection);
		}
		return $result;
	}

	function deleteCustomerInfo($customerId) {
		global $connection;
		$query = "Delete from tbcustomer where customerId=$customerId;";
		
		$result = mysqli_query($connection, $query);

		if($result == false) {
			 echo "error: " . mysqli_error($connection);
		}
		return $result;

	}
?>