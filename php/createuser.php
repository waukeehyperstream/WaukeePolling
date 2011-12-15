<?php

include '../db/connection.php';
$collection = $db->users;

if($collection){

}

$username = $_POST['username'];
$password = $_POST['password'];

$salt = 'imagoofygooberyeah5';
$encryptedpassword = md5($password . $salt);

$userarray = array("username" => $username, "password" => $encryptedpassword);

$filter = array("username" => $username);
$foundone = $collection->findOne($filter);
if ($foundone){
	echo 'This username has already been created';
}else{
	$inserted = $collection->insert($userarray);
	if ($inserted){
		echo 'User created!';
	}else{
		echo 'Username available, but an error occured.';
	}
}

?>


<html>
<head>
<meta http-equiv="refresh" content="2;url=http://localhost/WaukeePolling/index.php">
</head>
</html>




