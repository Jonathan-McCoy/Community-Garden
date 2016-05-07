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



<div id="wrapper">

	<?
		if (isset($_POST['LogOut'])){

			unset($_SESSION["admin"]);
			header('Location: login.php');
		}
	?>

	<script>
		function confirmDel(Name, ID) {
		// javascript function to ask for deletion confirmation

			url = "admin_delete.php?ID="+ID;
			var agree = confirm("Delete this item: " + Name + " ? ");
			if (agree) {

				// redirect to the deletion script
				location.href = url;
			}
			else {

				// do nothing
				return;
			}
		}
	</script>

	<?
		// This form is used for both adding or updating a record.
		// place holder for product id information.  Set it as empty initally.
		$ID = ""; 

		// Set all values for the form as empty.  To prepare for the "adding a new item" scenario.  
		$Name = "";
		$tip = "";

		$errMsg = "";

		// check to see if a product id available via the query string
		if (isset($_GET['ID'])) {

			// get the integer value from $_GET['pid']
			$ID = intval($_GET['ID']);

			// validate the product id -- it has to be an integer to be used in the query below
			if (is_int($ID)){
					
				//compose a select query
				$sql = "SELECT Name, tip from Tips WHERE ID = ?";
					
				$stmt = $conn->stmt_init();

				if($stmt->prepare($sql)){
					$stmt->bind_param('i',$ID);
					$stmt->execute();

					// bind the four pieces of information necessary for the form.
					$stmt->bind_result($Name, $tip); 
					
					$stmt->store_result();
						
					// proceed only if a match is found -- there should be only one row returned in the result
					if($stmt->num_rows == 1){
						$stmt->fetch();
					} else {
						$errMsg = "<b>!</b> Information on the record you requested is not available.  If it is an error, please contact the webmaster.  Thank you.";
						
						// reset $ID
						$ID = ""; 
					}
				} else {
					// reset $ID
					$ID = "";

					// compose an error message
					$errMsg = "<b>!</b> If you are expecting to edit an exiting item, there are some error occured in the process.  Please follow the link below to the product adminstration interface or contact the webmaster.  Thank you.";
				}
				$stmt->close();
			} 
			// close if(is_int($pid))
		}
	?>

	<div id="main">

		<?= $SubTitle_Admin ?>

		<div id='title'>

			<center><h3>Gardening Tips</h3><br></center>

		</div>

		<?= $errMsg ?>

		<br>

		<div id='chart'>
			<form action="admin_edit.php" method="POST">

				<!-- pass the pid information using a hidden field -->
				<input type="hidden" name="ID" value="<?=$ID?>">

				<center><table>
					<tr><td>Name:</td><td><input type="text" name="Name" size="45" value="<?= $Name ?>"></td></tr>
					<tr><td>Tip:</td><td><input type="text" name="tip" size="100" value="<?= $tip ?>"></td></tr>
					<tr><td colspan=2><input type=submit name="Submit" value="submit"></td></tr>
				</table></center>
			</form>
		</div>
	</div>

	<?php print $aFoorter; ?>

</div>
</body>
</html>