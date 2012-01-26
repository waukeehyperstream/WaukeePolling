<?php
session_start();

session_unset();
session_destroy();

echo "Logging off...";

?>

<html>
<head>
<meta http-equiv="refresh" content="1;url=http://localhost/WaukeePolling/index.php">
</head>
</html>
