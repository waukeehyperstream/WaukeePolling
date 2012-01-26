<?php

include '../db/connection.php';
$collection = $db->users;

$username = $_POST['username2'];
$password = $_POST['password2'];

$salt = 'imagoofygooberyeah5';
$encryptedpassword = md5($password . $salt);

$filter = array("username" => $username, "password" => $encryptedpassword);

$searchforrecord = $collection->findOne($filter);
$rank = $searchforrecord["rank"];

if ($searchforrecord){
	echo "Record found for your user!";
	echo "<br>Your rank: $rank"; //ranks are student, teacher, admin
	$_SESSION['rank'] = $rank;
	$_SESSION['username'] = $username;
}else{
	echo "Your login failed!";
}

?>


<html>
<head>
<meta http-equiv="refresh" content="2;url=http://localhost/WaukeePolling/index.php">
</head>
</html>
