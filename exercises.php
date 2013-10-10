<?php 
$problems = $_POST["problems"] - 1;

if($problems >= 0) {

$db = new PDO("sqlite:cyspell.db");

//TODO need a better way to get size
$result = $db->query("SELECT rowid FROM problems");
$size = 0;
foreach($result as $row)
	$size++;

$id = rand(1, $size);
$result = $db->query("SELECT * FROM problems WHERE rowid = $id");

//TODO need to fix this too
$picture  = "";
$answer = "";
foreach($result as $row) {
	$picture =  $row['picture'];      
	$answer =  $row['answer'];
}

echo <<<EOHTML
<html>
<head>
<link rel="stylesheet" href="css/styles.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="js/jquery.transit.min.js"></script>
<script>
$(document).ready(function(){
	$('#submitword').bind('mouseenter',function(){
		$(this).transition({backgroundColor: 'yellow',color: 'limegreen',border: '2px solid yellow', queue: false},150);
		$(this).bind('mouseout',function() {
			$(this).transition({backgroundColor: '',color: 'white',border: '2px solid white', queue: false},150);
			$(this).unbind('mouseout');
			return false;
		});
		return false;
	});
	$('#spellhere').bind('focus', function() {
		$(this).transition({border: '2px dashed yellow', backgroundColor: 'green', queue: false},150);
		$(this).bind('blur',function() {
			$(this).transition({backgroundColor: 'limegreen',border: '2px solid yellow', queue: false},150);
			$(this).unbind('blur');
			return false;
		});
		return false;
	});
	$('.cylink').bind('mouseenter',function(){
		$(this).transition({backgroundColor: 'yellow',color: 'limegreen',border: '2px solid yellow', queue: false},150);
		$(this).bind('mouseout',function() {
			$(this).transition({backgroundColor: '',color: 'white',border: '2px solid white', queue: false},150);
			$(this).unbind('mouseout');
			return false;
		});
		return false;
	});
	setTimeout(function() {
		$('#spellhere').focus();
	}, 250);
});
</script>
</head>
<body>
<a class="cylink" href="index.php">Home</a><br/>
<br/>
<div class="exercisetext">$problems exercises left.</div>
<img id="image" border="0" src="$picture"  width="304" height="228"><br/>
<span class="exercisetext">What is this?</span>
<form action="" method="post">
	<input type="hidden" name="problems" value="$problems">
	<input id="spellhere" type="text" name="answer" autocomplete="off"><br>
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
<script>
$(document).ready(function() {
	$('.cylink').bind('mouseenter',function(){
		$(this).transition({backgroundColor: 'yellow',color: 'limegreen',border: '2px solid yellow', queue: false},150);
		$(this).bind('mouseout',function() {
			$(this).transition({backgroundColor: '',color: 'white',border: '2px solid white', queue: false},150);
			$(this).unbind('mouseout');
			return false;
		});
		return false;
	});
});
</script>
</head>
<body>

<a class="cylink" href="index.php">Home</a><br/>

<p>
<div class="exercisetext" >Thank you for playing! :)</div>
</p>

</body>
</html>

EOHTML;

}
?>
