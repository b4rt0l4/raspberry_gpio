<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<html>
	<head>
		<!--/var/www/rele/index.php-->
		<script type='text/javascript' src='jquery-1.11.1.js'></script>
		<script language="javascript">

			var actualizar=function(boton, action, gpiopin) {
				document.getElementById(boton).disabled = true;
				$.ajax({
					type: "POST",
					url: "accion.php",
					data: { accion: action, pin: gpiopin }
				})
				.done(function( msg ) {
					document.getElementById("rtn").innerHTML=msg;
				})
				.fail(function ( jqXHR, textStatus ) {
					document.getElementById("rtn").innerHTML="Error en petición: "+textStatus;
				}).always(function() {
					document.getElementById(boton).disabled = false;
				});
			}

		</script>
	</head>
	<body>
		<form action="accion.php" method="post">
			Puerta 1
			<input type="button" id="AbrirPuerta16" value="Abrir" onclick="javascript:actualizar(this.id, 'Abrir', 16);">
			<input type="button" id="Parpadear16" value="Parpadear" onclick="javascript:actualizar(this.id, 'Parpadear', 16);">
			<input type="button" id="CerrarPuerta16" value="Cerrar" onclick="javascript:actualizar(this.id, 'Cerrar', 16);">
			<br>
			Puerta 2
			<input type="button" id="AbrirPuerta24" value="Abrir" onclick="javascript:actualizar('AbrirPuerta24', 'Abrir', 24);">
			<input type="button" id="Parpadear24" value="Parpadear" onclick="javascript:actualizar('Parpadear24', 'Parpadear', 24);">
			<input type="button" id="CerrarPuerta24" value="Cerrar" onclick="javascript:actualizar('CerrarPuerta24', 'Cerrar', 24);">
		</form>
		<div id='rtn'>
		</div>
	</body>
</html>
