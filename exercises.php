<?php 
$problems = $_POST["problems"] - 1;
$grade = $_POST["grade"];

if($problems >= 0) {

$db = new PDO("sqlite:cyspell.db");

//$results = $db->query("SELECT * FROM problems");

//$id = rand(count($results));
//$picture =  $results[$id]['picture']; 
//$answer =  $results[$id]['answer'];

$picture = "images/apple.png";
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
<div> class="exercisetext">$problems exercises left.</div>
<img id="image" border="0" src="$picture"  width="304" height="228"><br/>
<span class="exercisetext">What is this?</span>
<form action="" method="post">
	<input type="hidden" name="problems" value="$problems">
	<input id="spellhere" type="text" name="answer"><br>
	<input id="submitword" type="submit">
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
<div class="exercisetext" >Thank you for playing! :)</div>
</p>

</body>
</html>

EOHTML;

}
?>
