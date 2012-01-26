<?php
session_start();
$username = $_SESSION['username'];
echo "Loading polls...";

include '../db/connection.php';
$collection = $db->polls;

$allpolls = $collection->find(array("key" => "stuff"));

echo "<table border='1'>";
echo "<tr><th>Poll name</th></tr>";

foreach ($allpolls as $one) {
    echo "<tr>";
		echo "<td onClick='javascript:getpolldata(\"" . $one["_id"] . "\")'>" . $one["name"] . "</td>";
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
					allquestiondata = "Question: " + questionname + "<br>";
					for(onum=0;onum<pollObject["questions"][qnum]["options"].length;onum++){
						optionname = pollObject["questions"][qnum]["options"][onum]["optionname"];
						votes = pollObject["questions"][qnum]["options"][onum]["votes"];
						alloptiondata = "-" + optionname + ": " + votes + "<br>";
						allquestiondata += alloptiondata;
					}
					allpolldata += allquestiondata;
					document.getElementById("polldiv").innerHTML += allpolldata;
				}
		});
}


</script>

<div id="polldiv">

</div>
