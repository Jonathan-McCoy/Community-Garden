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
			<?php 

				//=========================================================
				//				Nav
				//=========================================================

			/*	$sql = "SELECT CID, CName FROM ImgCategory ORDER BY CName asc";

				/* prepared statement *
				$stmt = $conn->stmt_init();
					
				if ($stmt->prepare($sql)) {

					/* execute statement *
					$stmt->execute();

					/* bind result variables *
					$stmt->bind_result($CID, $CName);
					
					/* fetch values *
					
					while ($stmt->fetch()) {
						print ("<a href='?CID=$CID'>$CName</a> |");
					}
					

					/* close statement *
					$stmt->close();

				} else {
					print ("nav failed");
				}


				if (is_int (intval( $_GET['CID'] )) && is_numeric($_GET['CID'])){
					$CID = $_GET ['CID'];
				} else {
					$CID = 1; // default
				}
				//==================================================
				// category information
				//==================================================
					
				$sql = "SELECT CName FROM ImgCategory WHERE CID = ?";

				$stmt = $conn->stmt_init();

				if ($stmt->prepare($sql)) {
						
					/* bind the parameter onto the query*
					$stmt->bind_param('i', $CID);

					/* execute statement 
					$stmt->execute();

					/* bind result variables *
					$stmt->bind_result($CName);

					/* fetch values *
					if ($stmt->fetch()) { // there should be only one record, therefore, no need for a while loop
						
						print ("<h3>$CName Images</h3>");
					} else {
						print ("No category name is retrieved. <br/>");
					}			
						
					} else {
						print ("heading failed");
					}
					/* close statement *
					$stmt->close();*/

					//============================================
					// Link List
					//============================================

					$sql = 'SELECT ID, URL, Caption FROM pictures';
					
					$stmt = $conn->stmt_init();
						
					if ($stmt->prepare($sql)) {

						/*bind the parameter onto the guery*/
						//$stmt->bind_param("i", $CID);

						/* execute statement */
						$stmt->execute();

						$stmt->store_result();

						$num_row = $stmt->num_rows;

						/* bind result variables */
						$stmt->bind_result($ID, $URL, $Caption/*, $width, $height, $CID*/);

						/* fetch values */
						
						if ($num_row > 0){
							//print "($num_row photos of this exset.)";
						// print the list
						echo "<ol type=\"1\">";
							while ($stmt->fetch()) {
								print ("<li><h3>$Caption</h3><br> <img src = \"$URL\" ></li>\n");
							}
						echo "</ol>";

						} else {
						// print the err msg
							print ("There is currently no images for this.");
						}
						
						/* close statement */
						$stmt->close();

					} else {
						print ("data failed");
					}
				

				/* close connection */
				$conn->close();

			?>
		</div>
	</div>

<?php print ("$footer");?>
    
</body>
</html>
