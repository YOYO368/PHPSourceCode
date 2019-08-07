<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	require('../database/database.php');
	require('../database/customer_query.php');

	$customerId = urldecode($_POST['customerId']);
	$customerPassword = urldecode($_POST['customerPassword']);
	$firstName = urldecode($_POST['firstName']);
	$lastName = urldecode($_POST['lastName']);
	$email = urldecode($_POST['email']);
	$PhoneNumber = urldecode($_POST['phoneNumber']);

	$result = registerCustomer($customerId, $customerPassword, $firstName, $lastName, $email, $PhoneNumber);
	
	echo $result;
}
?>