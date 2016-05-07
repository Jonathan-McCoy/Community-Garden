<?php
session_start();
/*if($_SESSION['admin']!==true){
	header('Location: login.php');//could not make work for some odd reason...
}*/

	include("dbconn.inc.php");
	include("shared.php");

	// make database connection
	$conn = dbConnect();

	print ("$admin");?>

	<div class="row">
		<div class="large-8 columns">
			<img src="img/plot_layout.jpg"/>
		</div>
	</div>

<?php print ("$footer");?>
    
</body>
</html>
