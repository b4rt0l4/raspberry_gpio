<?php
header('Content-Type: text/html; charset=UTF-8');

function getgeneralPurposeGpioPins () {
	return array (4,5,6,12,13,16,17,18,19,20,21,22,23,24,25,26,27);
}

function createButtons ($buttonArray) {
	echo ('<table style="width: auto;" class="table table-striped table-condensed table-bordered">');
	echo ('<th>Pin</th><th>Actions</th>');
	foreach ($buttonArray as $button) {
		echo ('<tr>');
		echo ('<td>GpioPin '.$button.'</td>');
		echo ('<td>');
		echo ('<div class="btn-group" role="group">');
		echo ('<button type="button" class="btn btn-default" id="on-'.$button.'" onclick="javascript:actualizar(this.id);">On</button>');
		echo ('<button type="button" class="btn btn-default" id="blink-'.$button.'" onclick="javascript:actualizar(this.id);">Blink</button>');
		echo ('<button type="button" class="btn btn-default" id="off-'.$button.'" onclick="javascript:actualizar(this.id);">Off</button>');		
		echo ('</div>');
		echo ('</td>');
		echo ('</tr>');
	}
	echo ('</table>');
}
?>
<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="./static/bootstrap-3.3.4-dist/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="./static/bootstrap-3.3.4-dist/css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<script src="./static/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
			
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
					document.getElementById("rtn").innerHTML = msg;
				})
				.fail(function ( jqXHR, textStatus ) {
					document.getElementById("rtn").innerHTML = "Request error: " + textStatus;
				}).always(function() {
					document.getElementById(objectID).disabled = false;
				});
			}

		</script>
	</head>
	<body>
		<div class="panel panel-default">
		 	<div class="panel-heading">GPIO pin control with raspberry pi</div>
		 		<div class="panel-body">
		 			<p>
		 				With this panel you can manipulate GPIO pins of a raspberry pi.
		 				Actions that can be performed are put in ON, put in OFF and BLINK.
		 			</p>
		 			<div>
		 				<span>Last action performed: </span><span id='rtn'></span>
					</div>
					<form action="gpiopin_action.php" method="post">
						<?php
						createButtons (getgeneralPurposeGpioPins());
						?>
					</form>

				</div>
			</div>
		</div>
	</body>
</html>
