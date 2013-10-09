<?php

echo <<<EOHTML

<html>
<head>
<title>CySpell</title>
<link rel="stylesheet" href="css/styles.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="js/jquery.transit.min.js"></script>
<script>
$(document).ready(function(){
	$('#gradelist a').bind('mouseenter',function(){
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

<h1 class="maintitle">CySpell</h1>

<p class="subtitle">A learning game for kids.</p>

<ul id="gradelist">
<li><a href="start.php?grade=prek">Pre-K</a></li>
<li><a href="start.php?grade=k">Kindergarten</a></li>
<li><a href="start.php?grade=1">First Grade</a></li>
<li><a href="start.php?grade=2">Second Grade</a></li>
<li><a href="start.php?grade=3">Third Grade</a></li>
</ul>

</body>
</html>

EOHTML;

?>
