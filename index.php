<?php

include 'db/connection.php';
$collection = $db->userdata;

if ($_SESSION['username']){
	echo 'You are logged in.';
}else{
	echo 'not logged in.';
}


?>


<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="../js/actions.js"></script>


</head>
<body>

<form method="POST" action="php/createuser.php">
<h3>Signup</h3>
Desired username:<input type="text" name="username" />
<br />
Desired password:<input type="password" name="password" />
<br />
<input type="submit" value="Create User" />
</form>


<form method="POST" action="php/loginuser.php">
<h3>Login</h3>
Username:<input type="text" name="username2" />
<br />
Password:<input type="password" name="password2" />
<br />
<input type="submit" value="Login" />

</form>
<br />
<a href="php/makepoll.php">Make me a poll</a>
<br />
<a href="php/modifypoll.php">Modify an existing poll</a>
<br />
<a href="php/loadpolls.php">Load the polls</a>
<br />
<a href="php/logout.php">Logout</a>

<div id="pagestuff">
<?php

if ($_GET['page'] == 'makepoll'){
	include 'php/makepoll.php';
}
?>
</div>

</body>
</html>
