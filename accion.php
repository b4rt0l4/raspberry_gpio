<?php
if (isset($_POST["accion"])) {

	$accion = $_POST["accion"];
	$route = "/var/www/html/leds/";

	switch ($accion) {
		case "AbrirPuerta16":
			$command = "enciende.sh";
			$gpioPin = 16;
			break;
		case "Parpadear16":
			$command = "parpadea.sh";
			$gpioPin = 16;
			break;
		case "CerrarPuerta16":
			$command = "apaga.sh";
			$gpioPin = 16;
			break;
		case "AbrirPuerta24":
			$command = "enciende.sh";
			$gpioPin = 24;
			break;
		case "Parpadear24":
			$command = "parpadea.sh";
			$gpioPin = 24;
			break;
		case "CerrarPuerta24":
			$command = "apaga.sh";
			$gpioPin = 24;
			break;
	}

	if ( (isset($command) && strlen($command) > 0) && (isset($gpioPin) && (is_numeric($gpioPin)))) {
		exec("sh ".$route.$command." ".$gpioPin);
        	print "Acción ".$accion." ejecutada correctamente";
	} else {
		print "Acción ".$accion." incorrecta, no se pudo ejecutar";
	}
} else {
	print "Error, no viene Acción";
}
?>
