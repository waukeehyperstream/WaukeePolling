var optioncounter = 2;
//var questioncounter = 1;

function addOption(){
	optioncounter++;
	htmltoadd = "<br>Option " + optioncounter + ": <input type='text' name='option" + optioncounter + "' />";
	document.getElementById('options1').innerHTML += htmltoadd;
}

/*function addQuestion(){
	questioncounter++;
	htmltoadd = "<fieldset>Question " + questioncounter + ":<input type='text' name='question1' /><br /><div id='options" + optioncounter + "'>Option 1: <input type='text' name='q1o1' /><br />Option 2: <input type='text' name='q1o2' /><br><input type='button' value='Add option' onClick='addOption();'/><input type='button' value='Remove option' /></fieldset>";
	document.getElementById('questions').innerHTML += htmltoadd;
}
*/


