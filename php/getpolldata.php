<?php
session_start();
$username = $_SESSION['username'];

include '../db/connection.php';
$collection = $db->polls;

$pollid = $_POST['pollid'];

$thepoll = $collection->findOne(array('_id' => new MongoId($pollid)));

echo json_encode($thepoll);

?>
