<?php
session_start();
$username = $_SESSION['username'];
echo "Loading polls...";

include '../db/connection.php';
$collection = $db->polls;

$allpolls = $collection->findOne(array("name" => "sdfsdf"));

echo count($allpolls);


?>
