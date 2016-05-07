<?php
	include("dbconn.inc.php"); 
	include("shared.php");

	// make database connection
	$conn = dbConnect();

	print ("$HTML"); 

	// Process only if there is any submission
	if (isset($_POST['Submit'])) {

		//validate user input
			
		$required = array("Name", "tip");
		$expected = array("Name", "tip", "ID");
		$missing = array();
			
		foreach ($expected as $field){

			if (in_array($field, $required) && (!isset($_POST[$field]) || empty($_POST[$field]))) {
				array_push ($missing, $field);
			} else {

				// Passed the required field test, set up a variable to carry the user input.  
				if (!isset($_POST[$field])) {

					//$_POST[$field] is not set, set the value as ""
					${$field} = "";
				} else {
						
					${$field} = $_POST[$field];
				}
			}
		}

		//print_r ($missing); // for debugging purpose

		/* proceed only if there is no required fields missing and all other data validation rules are satisfied */
		if (empty($missing)){

			// processing user input

			$stmt = $conn->stmt_init();


			// compose a query: Insert or Update?
			if ($ID != "") {
				/* an existing pid ==> update query */ 
					
				// ensure $pid is an integer
				$pid = intval($ID); 

				$sql = "Update Tips SET ID = ?, Name = ?, tip = ? WHERE ID = ?";
						
				if($stmt->prepare($sql)){

					$stmt->bind_param('iss', $ID, $Name, $tip);
					$stmt_prepared = 1;
				}
			} else {
				// noe existing pid ==> insert query
				$sql = "Insert Into Tips (ID, Name, tip) values (?, ?, ?)";

				if($stmt->prepare($sql)){

					$stmt->bind_param('iss', $ID, $Name, $tip);
					$stmt_prepared = 1; 
				}
			}

			if ($stmt_prepared == 1){

				if ($stmt->execute()){

					header("Location: admin_tip.php");
				
				} else {

					//$stmt->execute() failed.
					$output = "<p>Database operation failed.  Please contact the webmaster.";
				}
			} else {

				// statement is not successfully prepared (issues with the query).
				$output = "<p>Database query failed.  Please contact the webmaster.";
			}

		} else { 

			// $missing is not empty
			$output = "<p>The following required fields are missing in your form submission.  Please check your form again and fill them out.  <br>Thank you.<br>\n<ul>";
			foreach($missing as $m){
				$output .= "<li>$m";
			}

			$output .= "</ul>";
		}
	} else {

		$output = "Please work from the <a href='admin_aList.php'>admin page</a>.";
	}
?>
<?= $SubTitle_Admin ?>
<?= $output ?>

</body>
</html>