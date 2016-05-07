<?php
session_start();
// acquire shared info from other files
include("dbconn.inc.php");
include("shared.php");

// make database connection
$conn = dbConnect();
?>
<?
	if (isset($_POST['Submit'])){

		$required = array("Name", "Password");
		$expected = array("Name", "Password");
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

		if (empty($missing)){

			$sql = "SELECT Name, Password  FROM Admin where Name = ? AND Password = ?" ;

			$stmt = $conn->stmt_init();

			if ($stmt->prepare($sql)){
				$stmt->bind_param('ss', $Name, $Password);
				$stmt->execute();

				$stmt->bind_result($Name, $Password);

				while ($stmt->fetch()){
					print ("-".$Admin);
					if ($_POST['name']==$name && $_POST['Password']==$Password){
						header('Location: admin_page.php');
						exit;
					}else{
						header('Location: home.php');
					}
				}
			}
		} else {
			$output = "The name and/or Password you entered is incorect please try again.";
		}
	}
?>

<?php print $HTML;?>
<div class="row">
	<div class="large-8 columns">
	<?php echo $output; ?>
	
		<form id="chart" method="POST" action="">
			<label>Sign in</label>
			<br>
			<table>
				<tr><td>name:</td>&nbsp;<td><input type="text" name="Name"></td></tr>

				<tr><td>Password:</td>&nbsp;<td><input type="password" name="Password"></td></tr>	
			</table>
			<br>
			<input id="button" type="submit" name="Submit" value="Submit">

		</form>
	</div>
</div>

<?print("$footer");?>

</BODY>
</HTML>