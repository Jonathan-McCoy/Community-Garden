<?php
	include("dbconn.inc.php");
	include("shared.php");

	// make database connection
	$conn = dbConnect();
	
	// place holder for product id information
	$ID = ""; 

	if (isset($_GET['ID'])) { 

		$ID = intval($_GET['ID']); 

		// validate the product id -- check to see if it is a number
			if (is_int($ID)){

				//compose the query
				$sql = "DELETE from Tips WHERE ID = ?"; 

				$stmt = $conn->stmt_init();

				if ($stmt->prepare($sql)){

					$stmt->bind_param('i',$ID);

					if ($stmt->execute()){ 
						
						// $stmt->execute() will return true (successful) or false
						$output = "<p>The selected record has been seccessfully deleted.</p>";
					} else {

						$output = "<p>The database operation to delete the record has failed.  Please try again or contact the system administrator.</p>";
					}	
				}
			} else {

				// ID is not an integer. reset $pid
				$ID = "";

				// compose an error message
				$output = "<p><b>!</b> If you are expecting to delete an exiting item, there are some error occured in the process.  Please contact the webmaster.  Thank you.</p>";
			}
	} else {

		// $_GET['ID'] is not set, which means that no product id is provided
		$output = "<p><b>!</b> To manage product records, please follow the link below to visit the admin page.  Thank you. </p>";
	}
?>

<br>

<?php print ("$HTML");?>

	<div id="wrapper">
			
		<div id="main">

		<?= $SubTitle_Admin ?>

		<?= $output ?>

		<p>Back to the <a href='admin_tips.php'>Admin's Tips Page</a></p>

		<?php print $footer; ?>
	</div>
</body>
</html>