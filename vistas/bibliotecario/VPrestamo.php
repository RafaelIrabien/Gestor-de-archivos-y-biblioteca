



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css_l/hoja_prestamo.css">
	<title></title>
</head>
<body>
	<div id="ContPrestamo">
		
		<div id="ContDatos">
			<h1>Préstamo</h1>
			<form id="FormPrestamo">
				<div>
					<label>Nombre del lector:</label>
					<div>
						<input type="text" name="lector">
					</div>
				</div>

				<div id="MsjVerificarLector">
					
				</div>

				<div>
					<label for="dtpFecha">Fecha Devolución:</label>
					<input type="date" name="dtpFecha" id="dtpFecha" step="1" min="" max="" value="">
				</div>

				<div>
					<label for="txtCodLibro">Códico Libro:</label>
					<div>
						<input type="number" id="txtCodLibro" name="txtCodLibro" min="1">
					</div>
				</div>

				<div id="MsjVerificarLibro">
					
				</div>

				<div id="botones">
					<button type="button" onclick="GuardarPrestamo();">
						Guardar Préstamo
					</button>
					<button type="button" onclick="VistaInicio();">
						Cancelar Préstamo
					</button>
				</div>

				<div id="MsjVerificarPrestamo">
					
				</div>
			</form>
		</div>
	</div>

</body>
</html>