<?php



?>
<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="../js/actions.js"></script>
</head>
<body>
<form method="POST" action="domakepoll.php" name="pollform">
Desired poll name:<input type="text" name="pollname" />
<br />
<fieldset>
Question 1:<input type="text" name="question1" />
<br />
<div id="options1">
Option 1: <input type="text" name="question1option" />
<br />
Option 2: <input type="text" name="question1option" />
</div>
<br />
<input type="button" value="Add option" onClick="addOption();"/><input type="button" value="Remove option" />
<br>
<input type="submit" />
</fieldset>
</form>
<input type="button" onClick="addQuestion();" value="Add Question" />
</body>
</html>
