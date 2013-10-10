<?php 
$problems = $_POST["problems"] - 1;
$grade = $_POST["grade"];

if($problems >= 0) {

$db = new PDO("sqlite:cyspell.db");

$results = $db->query("SELECT * FROM problems;");
var_dump(count($results));
$id = rand(count($results));
$picture =  $results[$id]['picture']; 
$answer =  $results[$id]['answer'];

echo <<<EOHTML
<html>
<head>
<link rel="stylesheet" href="css/styles.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="js/jquery.transit.min.js"></script>
</head>
<body>
<a href="index.php">Home</a><br/>
<br/>
$problems exercises left. <br/><br/>
<img border="0" src="$picture"  width="304" height="228"><br/>
What is this? <br/>
<form action="" method="post">
	<input type="hidden" name="problems" value="$problems">
	<input type="text" name="answer"><br>
	<input type="submit">
</form>

</body>
</html>

EOHTML;
}
else {
echo <<<EOHTML
<html>
<head>
<link rel="stylesheet" href="css/styles.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="js/jquery.transit.min.js"></script>
</head>
<body>

<a href="index.php">Home</a><br/>

<p>
Thank you for playing! :)
</p>

</body>
</html>

EOHTML;

}
?>
