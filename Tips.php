<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
	// acquire shared info from other files
	include("shared.php");
	include("dbconn.inc.php");
	$conn = dbConnect(); 
?>

<?php print ("$HTML");?>

	<div class="row">
		<div class="large-8 columns">
			<h2>Gardening Tips</h2>
			<?php
				$sql = "SELECT ID, Name, tip, CID FROM Tips ORDER BY ID ASC";
				
				
				/* create a prepared statement */
				$stmt = $conn->stmt_init();
					
				if ($stmt->prepare($sql)) {

					/* execute statement */
					$stmt->execute();

					/* bind result variables */
					$stmt->bind_result($ID, $Name, $tip, $CID);
					
					/* fetch values */
					?><div>
					
					<? echo "<ul>";

					while ($stmt->fetch()) {

						print ("<li><h4>$Name</h4>$tip</li>\n");
					}

					echo "</ul>";?></div><?
					

					/* close statement */
					$stmt->close();
				} else {

					print ("List Failed");
				}
			?>
		</div>
	</div>

<?php print ("$footer");?>
    
</body>
</html>
