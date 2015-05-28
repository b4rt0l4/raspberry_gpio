<?php
header('Content-Type: text/html; charset=UTF-8');

function getgeneralPurposeGpioPins () {
	return array (4,5,6,12,13,16,17,18,19,20,21,22,23,24,25,26,27);
}

function createButtons ($buttonArray) {
	echo ('<table>');
	foreach ($buttonArray as $button) {
		echo ('<tr>');
		echo ('<td>GpioPin '.$button.'</td>');
		echo ('<td><input type="button" id="on-'.$button.'" value="On" onclick="javascript:actualizar(this.id);"></td>');
		echo ('<td><input type="button" id="blink-'.$button.'" value="Blink" onclick="javascript:actualizar(this.id);"></td>');
		echo ('<td><input type="button" id="off-'.$button.'" value="Off" onclick="javascript:actualizar(this.id);"></td>');
		echo ('</tr>');
	}
	echo ('</table>');
}
?>
<html>
	<head>
		<script type='text/javascript' src='./static/js/jquery-1.11.1.js'></script>
		<script language="javascript">

			var actualizar = function(objectID) {
				document.getElementById(objectID).disabled = true;
				var elem = objectID.split('-');
				$.ajax({
					type: "POST",
					url: "gpiopin_action.php",
					data: { action: elem[0], gpiopin: elem[1] }
				})
				.done(function( msg ) {
					document.getElementById("rtn").innerHTML=msg;
				})
				.fail(function ( jqXHR, textStatus ) {
					document.getElementById("rtn").innerHTML="Request error: " + textStatus;
				}).always(function() {
					document.getElementById(objectID).disabled = false;
				});
			}

		</script>
	</head>
	<body>
		<form action="gpiopin_action.php" method="post">
			<?php
				createButtons (getgeneralPurposeGpioPins());
			?>
		</form>
		<div id='rtn'>
		</div>
	</body>
</html>
