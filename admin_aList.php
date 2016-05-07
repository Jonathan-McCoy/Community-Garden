<?php
session_start();
if($_SESSION['admin']!==true){
	header('Location: login.php');
}

// acquire shared info from other files
include("dbconn.inc.php"); // database connection 
include("shared.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

// make database connection
$conn = dbConnect();

print ("$HTML"); 
?>

<div id="wrapper">

	<div id="main">

		<?
			if (isset($_POST['LogOut'])){

				unset($_SESSION["admin"]);
				header('Location: Tips.php');
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

		<center>
			<div id='chart'>
				<?php
					// Retrieve the product & category info
					$sql = "SELECT ID, Name, tip, CID FROM Tips order by ID asc";

					$stmt = $conn->stmt_init();

					if ($stmt->prepare($sql)){

						$stmt->execute();
						$stmt->bind_result($ID, $Name, $tip, $CID);
					
						$tblRows = "";
						while($stmt->fetch()){
							$Name_js = htmlspecialchars($Name, ENT_QUOTES); 

							$tblRows = $tblRows."<li>$Name</li>
												 <li>$tip</li>
												 <li><a href='admin_form.php?ID=$ID'>Edit</a> | <a href='javascript:confirmDel(\"$Name_js\",$ID)'>Delete</a> </li>";
						}
						
						$output = "<ul>\n"
							.$tblRows.
						"</ul>";
									
						$stmt->close();
					} else {

						$output = "Query to retrieve product information failed.";
					
					}

					$conn->close();
				?>
			</div>
		</center>

		<form method="POST" action="">
			<input id="logout" type="submit" name="LogOut" value="LogOut">
		</form>
				
		<?= $SubTitle_Admin ?>
		
		<br>
		
		| <a href="admin_form.php">Add a new Tip</a> |<br>

		<?php echo $output ?>

	</div>

	<?php print $footer; ?>

</div>
</body>
</html>