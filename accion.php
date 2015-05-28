<?php
if (isset($_POST["accion"]))
{
	$accion=$_POST["accion"];
	if ($accion=="AbrirPuerta16") {
		exec("sh /var/www/leds/enciende.sh 16");

	}

	if ($accion=="parpadear16") {
		exec ("sh /var/www/leds/parpadea.sh 16");
	}

	if ($accion=="CerrarPuerta16") {
		exec("sh /var/www/leds/apaga.sh 16");
	}

	// Funciones PHP del pin GPIO24
	if ($accion=="AbrirPuerta24") {
		exec("sh /var/www/leds/enciende.sh 24");
	}

	if ($accion=="parpadear24") {
		exec("sh /var/www/leds/parpadea.sh 24");
	}

	if ($accion=="CerrarPuerta24"){
		exec("sh /var/www/leds/apaga.sh 24");
	}
        print $accion . " llevada correctamente";
}
else print "Error, no viene Accion";
?>
