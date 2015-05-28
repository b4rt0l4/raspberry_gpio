<?php
if (isset($_POST["action"])) {

	$accion = $_POST["action"];
	$gpioPin = $_POST["gpiopin"];
	$route = "./commands/";

	switch ($accion) {
		case "on":
			$command = "on.sh";
			break;
		case "blink":
			$command = "blink.sh";
			break;
		case "off":
			$command = "off.sh";
			break;
	}

	if ( (isset($command) && strlen($command) > 0) && (isset($gpioPin) && (is_numeric($gpioPin)))) {
		exec("sh ".$route.$command." ".$gpioPin);
        	print "Action ".$accion." executed.";
	} else {
		print "Action ".$accion." is wrong. Can't be executed.";
	}
} else {
	print "Error, no action provided";
}
?>
