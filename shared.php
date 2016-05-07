<?
	$HTML = '<html class="no-js" lang="en">
				<head>
					<title>UTA | Community Garden </title>
					<meta charset="utf-8" />
					<meta name="viewport" content="width=device-width, initial-scale=1.0" />
					<link rel="stylesheet" href="css/foundation.css" />
					<link rel="stylesheet" href="css/Master.css"/>
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
					<script src="js/vendor/modernizr.js"></script>
					<script src="js/master.js"></script>
					<script src="https://maps.googleapis.com/maps/api/js"></script>

				</head>

				<body>
					<div class="row">
						<div class="large-12 columns">
							<a class="menu" href="#">Menu</a>
							<ul class="button-group">
								<li><a href="home.php" class="button">Home</a></li>
								<li><a href="about.php" class="button">About</a></li>
								<li><a href="rules.php" class="button">Rules</a></li>
								<li><a href="Pictures.php" class="button">Pictures</a></li>
								<li><a href="Tips.php" class="button">Tips</a></li>
								<li><a href="Plots.php" class="button">Plots</a></li>
							</ul>

							<p><img src="img/new_Logo.png"/></p>
						</div>
					</div>';

	$admin = '<html class="no-js" lang="en">
				<head>
					<title>UTA | Community Garden </title>
					<meta charset="utf-8" />
					<meta name="viewport" content="width=device-width, initial-scale=1.0" />
					<link rel="stylesheet" href="css/foundation.css" />
					<link rel="stylesheet" href="css/Master.css"/>
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
					<script src="js/vendor/modernizr.js"></script>
					<script src="js/master.js"></script>
					<script src="https://maps.googleapis.com/maps/api/js"></script>

				</head>

				<body>
				<div class="row">
					<div class="large-12 columns">
						<ul class="button-group">
							<li><a href="admin_page.php" class="button">Home</a></li>
							<li><a href="admin_about.php" class="button">About</a></li>
							<li><a href="admin_rules.php" class="button">Rules</a></li>
							<li><a href="admin_pictures.php" class="button">Pictures</a></li>
							<li><a href="admin_tip.php" class="button">Tips</a></li>
							<li><a href="admin_Plots.php" class="button">Plots</a></li>
							<li style="padding:10px;">Admin</li>
						</ul>
						<form method="POST" action="">
							<input id="logout" type="submit" name="LogOut" value="LogOut">
						</form>

						<p><img src="img/new_Logo.png"/></p>
						</div>
					</div>';

	$footer = '<footer class="row">
					<div class="large-12 columns">
					<hr/>
						<div class="row">
							<div class="large-6 columns">
							  <p>Class work only</p>
							</div>
							<div class="large-6 columns">
								<ul class="inline-list right">
									<li><a href="contact.php">Contact Us</a></li>
									<li><a href="Design_Journal.pdf">Design Journal</a></li>
									<li><a href="#" id="fail3">Facebook</a></li>
									<li><a href="#" id="fail4">Twitter</a></li>
									<li><a href="#" id="fail5">Instagram</a></li>
									<li><a href="#" id="fail6"></a></li>
									<li><a href="login.php">Admin</a></li>
								</ul>
							</div>
						</div>
					</div> 

				</footer>';

	$aFooter = '<footer class="row">
					<div class="large-12 columns">
					<hr/>
						<div class="row">
							<div class="large-6 columns">
							  <p>Class work only</p>
							</div>
							<div class="large-6 columns">
								<ul class="inline-list right">
									<li><a href="#" id="fail1"></a></li>
									<li><a href="#" id="fail2"></a></li>
									<li><a href="#" id="fail3">Facebook</a></li>
									<li><a href="#" id="fail4">Twitter</a></li>
									<li><a href="#" id="fail5">Instagram</a></li>
									<li><a href="#" id="fail6"></a></li>
								</ul>
								
							</div>
						</div>
					</div> 

				</footer>';
?>