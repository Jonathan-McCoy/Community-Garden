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
		<h4>How To Contact Us.</h4>
		<p>Adress: 406 Summit Avenue Arlington, Texas</p>
		<div id="map-canvas">
			<!-- from https://developers.google.com/maps/tutorials/customizing/ -->
			<script>
  				function initialize() {
  					var mapCanvas = document.getElementById('map-canvas');
  					var myLatLng = new google.maps.LatLng(32.733897, -97.122068);
  					var mapOptions = {
				    	center: myLatLng,
				      	zoom: 15,
				      	mapTypeId: google.maps.MapTypeId.ROADMAP
				    }
  					var map = new google.maps.Map(mapCanvas, mapOptions);
  					var marker = new google.maps.Marker({
  						position: myLatLng,
  						map: map,
  						Title: 'Us'
  					});
  				}
  				google.maps.event.addDomListener(window, 'load', initialize);

			</script>
		</div>
		
	</div>
</div>


<?php print ("$footer");?>
    
</body>
</html>
