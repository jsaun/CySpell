<?php
$grade = $_GET['grade'];
echo <<<EOHTML
<html>
<body>

<a href="index.php">Back</a><br/><br/>

Level: $grade

<form action="exercises.php" method="post">
	<select name="problems">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3" selected>3</option>
		<option value="4">4</option>
	</select>
	Problems <br/>
	<input type="submit">
</form>


</body>
</html>

EOHTML;


?>
