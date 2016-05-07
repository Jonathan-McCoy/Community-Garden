<?php

	include("dbconn.inc.php");
	$conn = dbConnect();

	// check to see if the form is submitted
	if (array_key_exists('upload', $_POST)) {

		// define constant for upload folder
		define('UPLOAD_DIR', 'storage/');

			// check file type first
			$allowed = array('image/tiff','image/gif', 'image/jpeg', 'image/png');

			if (in_array($_FILES['image']['type'], $allowed)){

				$fileName = $_FILES['image']['name'];

				$filePath = UPLOAD_DIR.$fileName;

				// move the file to the upload folder
				move_uploaded_file($_FILES['image']['tmp_name'], UPLOAD_DIR.$_FILES['image']['name']);

				$sql = "INSERT INTO pictures (URL) value ('$filePath')";
				$stmt = $conn->stmt_init();

				echo "Successfully Uploaded the File.";

			}else{
				//error message
			  	echo "The file you tried to upload is not a supported image type. Please use tiff, gif, jpeg, or png thank you.";
			}
		/*if(!get_magic_quotes_gpc()){
			$fileName = addslashes($fileName);
			$filePath = addslashes($filePath);
		}
		*/



		/*if($stmt_prepared == 1){
			header("")
		}*/
		//mysql_query($sql) or die('Error, queryfailed');
	}

			

	//replace " " with _ .....where on earth does it go?
	//$upload = str_replace(" ", "_", "$upload");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>File upload</title>
</head>

<body>

<form action="" method="post" enctype="multipart/form-data" name="uploadImage" id="uploadImage">
    <p>
	<label for="image">Upload image:</label>
        <input type="file" name="image" id="image" /> 

        <!--<br><br><label>Add a Caption: </label>
        <input type="text" name="caption" id="caption"/>-->
    </p>
    <p>
        <input type="submit" name="upload" id="upload" value="Upload" />
    </p>
</form>

<pre>

</pre>
</body>
</html>
