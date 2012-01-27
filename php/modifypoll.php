<?php
session_start();
$username = $_SESSION['username'];
$rank = $_SESSION['rank'];

include '../db/connection.php';
$collection = $db->polls;

$pollid = $_GET['id'];
echo $pollid;

?>
