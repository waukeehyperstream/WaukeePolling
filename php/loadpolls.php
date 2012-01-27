<?php
session_start();
$username = $_SESSION['username'];
echo "Loading polls...";

include '../db/connection.php';
$collection = $db->polls;

$allpolls = $collection->find(array("key" => "stuff")); //so we can grab all the polls easily

echo "<table border='1'>";
echo "<tr><th>Poll name</th><th>Vote</th><th>Modify</th></tr>";

foreach ($allpolls as $one) {
    echo "<tr>";
		echo "<td>" . $one["name"] . "</td><td onClick='javascript:getpolldata(\"" . $one["_id"] . "\")'>Vote</td><td><a href='modifypoll.php?id=" . $one["_id"] . "'>Modify</a></td>";
		echo "</tr>";
		
}

echo "</table>";



?>
<html>
<head>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript">
function getpolldata(id){
	
	$.post('getpolldata.php', {pollid: id}, 
		function(output){
				pollObject = jQuery.parseJSON(output);
				pollname = pollObject["name"];
				allpolldata = pollname + "<br>";
				for(qnum=0;qnum<pollObject["questions"].length;qnum++){
					questionnumber = pollObject["questions"][qnum]["questionnumber"];
					questionname = pollObject["questions"][qnum]["questionname"];
					allquestiondata = questionnumber + ". " + questionname + "<br>";
					for(onum=0;onum<pollObject["questions"][qnum]["options"].length;onum++){
						optionname = pollObject["questions"][qnum]["options"][onum]["optionname"];
						optionnumber = pollObject["questions"][qnum]["options"][onum]["optionnumber"];
						votes = pollObject["questions"][qnum]["options"][onum]["votes"];
						alloptiondata = "<input type='radio' name='" + questionnumber + "' value='" + optionnumber + "'/>" + optionname + ": " + votes + "<br>";
						allquestiondata += alloptiondata;
					}
					allpolldata += allquestiondata;
					document.getElementById("polldiv").innerHTML = allpolldata;
				}
		});
}


</script>

<div id="polldiv">

</div>
