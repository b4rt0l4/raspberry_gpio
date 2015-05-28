<html>
	<head>
		<!--/var/www/rele/index.php-->
		<script type='text/javascript' src='jquery-1.11.1.js'></script>
		<script language="javascript">

			var actualizar=function(boton) {
				document.getElementById(boton).disabled = true;
				$.ajax({
					type: "POST",
					url: "accion.php",
					data: { accion:  boton }
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
			<input type="button" id="AbrirPuerta16" value="Abrir" onclick="javascript:actualizar('AbrirPuerta16');">
			<input type="button" id="parpadear16" value="Parpadear" onclick="javascript:actualizar('parpadear16');">
			<input type="button" id="CerrarPuerta16" value="Cerrar" onclick="javascript:actualizar('CerrarPuerta16');">
			<br>
			Puerta 2
			<input type="button" id="AbrirPuerta24" value="Abrir" onclick="javascript:actualizar('AbrirPuerta24');">
			<input type="button" id="parpadear24" value="Parpadear" onclick="javascript:actualizar('parpadear24');">
			<input type="button" id="CerrarPuerta24" value="Cerrar" onclick="javascript:actualizar('CerrarPuerta24');">
		</form>
		<div id='rtn'>
		</div>
	</body>
</html>
