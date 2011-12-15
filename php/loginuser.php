<?php

include '../db/connection.php';
$collection = $db->users;

$username = $_POST['username2'];
$password = $_POST['password2'];

$salt = 'imagoofygooberyeah5';
$encryptedpassword = md5($password . $salt);

$filter = array("username" => $username, "password" => $encryptedpassword);

$searchforrecord = $collection->findOne($filter);

if ($searchforrecord){
	echo 'Record found for your user!';
	$_SESSION['username'] = $username; 
}else{
	echo 'Your login failed!';
}

?>


<html>
<head>
<meta http-equiv="refresh" content="2;url=http://localhost/WaukeePolling/index.php">
</head>
</html>
