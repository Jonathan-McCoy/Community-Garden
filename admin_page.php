<?php 
/*session_start();
	if($_SESSION['admin']!==true){
		header('Location: login.php');
	}*/
	// acquire shared info from other files
	include("dbconn.inc.php"); // database connection 
	include("shared.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

	// make database connection
	$conn = dbConnect();

	print ("$admin");

	if (isset($_POST['LogOut'])){

		unset($_SESSION["admin"]);
		header('Location: login.php');
	}
?>
	<div class="row">
		<div class="large-8 columns">
			<h4>This is a content section.</h4>
			<p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p>
			<p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p>
			<p><a href="#" class="secondary small button" id="hi">Next Page →</a></p>
		</div>

		<div class="large-4 columns">
			<?
				$sql = 'SELECT ID, URL, height, width FROM pictures where ID = 6';
					
					$stmt = $conn->stmt_init();
						
					if ($stmt->prepare($sql)) {

						/*bind the parameter onto the guery*/
						//$stmt->bind_param("i", $CID);

						/* execute statement */
						$stmt->execute();

						$stmt->store_result();

						$num_row = $stmt->num_rows;

						/* bind result variables */
						$stmt->bind_result($ID, $URL, $height, $width);

						// print the list
					
						while ($stmt->fetch()) {
							print ("<img id=\"front\" src = \"$URL\" height=\"$height\" width=\"$width\">\n");
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

	<div class="row">
		<div class="large-12 columns">
			<div class="panel">
				<h4>Get a Plot!</h4>
				<div class="row">
					<div class="large-9 columns">
						<p>Something else here.</p>
					</div>
					<div class="large-3 columns">
						<a href="#" class="radius button right">Apply Here</a>
					</div>
				</div>
			</div>
		</div>
	</div>

<? print ("$footer");?>
 </body>
</html>
