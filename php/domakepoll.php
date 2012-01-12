<?php
session_start();

include '../db/connection.php';
$collection = $db->polls;

$arrayofdata = $_POST;

$name = $_POST["pollname"];
$questionname = $_POST["question1"];

$optionarray = array();
$almostfinalarray = array();
$finalarray = array();

foreach ($_POST as $key => $var){
echo $key;
	$isgood = substr($key,0,6);
	echo $isgood;
	if ($isgood == "option"){
		echo 'fun';
		$thisoptionarray = array($_POST[$key] => 0);
		array_push($optionarray, $thisoptionarray);
	}
}
echo "<br>";

$almostfinalarray["questionname"] = $questionname;
$almostfinalarray["options"] = $optionarray;

$finalarray["name"] = $name;
$finalarray["question1"] = $almostfinalarray;

var_dump($finalarray);

$insert = $collection->insert($finalarray);
if($insert){
	echo "Inserted, satisfaction!";
}else{
	echo "FAILED.";
}




?>





