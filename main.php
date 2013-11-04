<?php

require_once 'sdk/facebook.php';

$config = array('appId' => '249696895179837', 'secret' => '446a84044156109ba1f39d09954c73b9');
$facebook = new Facebook($config);
?>
<html>
	<head>
		<title>CySpell</title>
		<link rel="stylesheet" href="css/styles.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script src="js/jquery.transit.min.js"></script>
		<script>
			$(document).ready(function() {
				$('#gradelist a').bind('mouseenter', function() {
					$(this).transition({
						backgroundColor : 'yellow',
						color : 'limegreen',
						border : '2px solid yellow',
						queue : false
					}, 150);
					$(this).bind('mouseout', function() {
						$(this).transition({
							backgroundColor : '',
							color : 'white',
							border : '2px solid white',
							queue : false
						}, 150);
						$(this).unbind('mouseout');
						return false;
					});
					return false;
				});
			});

		</script>
	</head>
	<body>
		<div id="fb-root"></div>

		<!--
		Below we include the Login Button social plugin. This button uses the JavaScript SDK to
		present a graphical Login button that triggers the FB.login() function when clicked.

		Learn more about options for the login button plugin:
		/docs/reference/plugins/login/ -->

		<h1 class="maintitle">CySpell</h1>
		<p class="subtitle">
			A learning game for kids.
		</p>

		<ul id="gradelist">
			<li>
				<a href="start.php?grade=k">Kindergarten</a>
			</li>
			<li>
				<a href="start.php?grade=1">First Grade</a>
			</li>
			<li>
				<a href="start.php?grade=2">Second Grade</a>
			</li>
			<li>
				<a href="start.php?grade=3">Third Grade</a>
			</li>
			<li>
				<a href="start.php?grade=4">Fourth Grade</a>
			</li>
			<a href="#" onclick="logout();"><img src="images/PNG/facebook.png"/></a>

		</ul>

		<script>
			window.fbAsyncInit = function() {
				FB.init({
					appId : '249696895179837', // App ID
					oauth : true,
					channelUrl : '//local.cyspell.com/channel.html', // Channel File
					status : true, // check login status
					cookie : true, // enable cookies to allow the server to access the session
					xfbml : true // parse XFBML
				});
			}; ( function() {
					var e = document.createElement('script');
					e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
					e.async = true;
					document.getElementById('fb-root').appendChild(e);
				}());

			function logout() {
				FB.logout(function(response) {
					// Person is now logged out
					console.log('LOGGED out..!, ' + response.name + '.');
					window.location.href = "index.php";

				});
			}
		</script>
	</body>
</html>