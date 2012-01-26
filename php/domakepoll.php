<?php
session_start();
$username = $_SESSION['username'];
$rank = $_SESSION['rank'];
echo $rank + "<br>";
if(($rank == 'admin') || ($rank == 'teacher')){

include '../db/connection.php';
$collection = $db->polls;

$arrayofdata = $_POST;

$name = $_POST["pollname"];
$questionname = $_POST["question1"];

$optionarray = array();
$questionarray = array();
$almostfinalarray = array();
$finalarray = array();

foreach ($_POST as $key => $var){
echo $key;
	$isgood = substr($key,0,6);
	echo $isgood;
	if ($isgood == "option"){
		echo 'fun';
		$thisoptionarray = array("optionname" => $_POST[$key], "votes" => 0);
		array_push($optionarray, $thisoptionarray);
	}
}
echo "<br>";

$questionarray["questionnumber"] = 1;
$questionarray["questionname"] = $questionname;
$questionarray["options"] = $optionarray;

array_push($almostfinalarray, $questionarray);

$finalarray["creator"] = $username;
$finalarray["created_at"] = time();
$finalarray["name"] = $name;
$finalarray["questions"] = $almostfinalarray;
$finalarray["key"] = "stuff";

var_dump($finalarray);

$insert = $collection->insert($finalarray);
if($insert){
	echo "Inserted, satisfaction!";
}else{
	echo "FAILED.";
}

}else{
	echo "Sorry, at this time, only teachers can make polls.";
}


?>

<html>
<head>
<meta http-equiv="refresh" content="1;url=http://localhost/WaukeePolling/index.php">
</head>
</html>



