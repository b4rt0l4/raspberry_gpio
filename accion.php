<?php
if (isset($_POST["accion"])) {

	$accion = $_POST["accion"];
	$gpioPin = $_POST["pin"];
	$route = "/var/www/html/leds/";

	switch ($accion) {
		case "Abrir":
			$command = "enciende.sh";
			break;
		case "Parpadear":
			$command = "parpadea.sh";
			break;
		case "Cerrar":
			$command = "apaga.sh";
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
