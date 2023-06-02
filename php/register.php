<?php
$fullname= filter_input(INPUT_POST, 'fullname');
$email = filter_input(INPUT_POST, 'email');
$pwd = filter_input(INPUT_POST, 'pwd');
$phone = filter_input(INPUT_POST, 'phone');
$address = filter_input(INPUT_POST, 'address');
$state = filter_input(INPUT_POST, 'state');
$city = filter_input(INPUT_POST, 'city');
$zip = filter_input(INPUT_POST, 'zip');
$cardNum = filter_input(INPUT_POST, 'cardNum');
$nameOnCard = filter_input(INPUT_POST, 'nameOnCard');
$expDate = filter_input(INPUT_POST, 'expDate');
$secCode = filter_input(INPUT_POST, 'secCode');

/* Error checking for blank fields. We did this in JavaScript
if ($fullname == null || $email == false || $pwd == null) {
	$error_message = "Invalid input, check your inputs and try again";
	include('error.php'); 
} else {
*/

require_once('database.php'); 

/* Search database for email*/
$query="SELECT * FROM user WHERE email=:email";
$statement = $db->prepare($query);
$statement->bindValue(':email', $email);
$success = $statement->execute();
$user = $statement->fetch();

if ($statement->rowCount() > 0) {
	$signupErrorMsg = "This email has already registered with us!";
	include('Signup.php');
} else {
	$query = 'INSERT INTO user(full_name, email, password, phone, address, state, city, zip, card_num, name_on_card, exp_date, sec_code) 
							VALUES(:fullname, :email, :password, :phone, :address, :state, :city, :zip, :cardNum, :nameOnCard, :expDate, :secCode)';
	$statement = $db->prepare($query);
	$statement->bindValue(':fullname', $fullname);
	$statement->bindValue(':email', $email);
	$statement->bindValue(':password', $pwd);
	$statement->bindValue(':phone', $phone);
	$statement->bindValue(':address', $address);
	$statement->bindValue(':state', $state);
	$statement->bindValue(':city', $city);
	$statement->bindValue(':zip', $zip);
	$statement->bindValue(':cardNum', $cardNum);
	$statement->bindValue(':nameOnCard', $nameOnCard);
	$statement->bindValue(':expDate', $expDate);
	$statement->bindValue(':secCode', $secCode);
	$statement->execute();
	$statement->closeCursor();
	header("Location: Homepage.php");
}
?>