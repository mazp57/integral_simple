<!DOCTYPE html>
<html>
<head>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Solución Integral Simple</title>

<link rel="stylesheet" href="resources/css/alertify/alertify.min.css"/>
<link rel="stylesheet" href="resources/css/alertify/default.min.css"/>
<link rel="stylesheet" href="resources/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="resources/css/fonts.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" type="text/css" href="resources/css/estilo2.css">
<script src="resources/js/jquery-2.1.3.min.js"></script>
<script src="resources/js/bootstrap.min.js"></script>
<script src="resources/js/alertify.min.js"></script>
<script>
$(function() {
	//AJAX
	jQuery('#button').click(function (e) {
		var simulaciones = jQuery("#simulaciones").val();
		jQuery.ajax({
			type: "POST",
			url: "submit.php",
			data: "simulaciones=" + simulaciones,
			success: function (data) {
				$('#resultado').html(data);
			}
		});				
		return false;
	});
});
</script>
</head>
<body style="background-color:#dadada;font-family:Open Sans;">
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand title" href="/">Grupo <span style="font-weight: 300;" class="span12">ZAMBRAANO Y LOSSADA</span></a>				
				</div>
			</div>
		</div>
	</nav>
	<div class="container">

	<div class="row">

	<div class="col-md-12">
	<div class="panel panel-boon">
	<div class="panel-body">
	<div class="page-header" style="margin:0px 0 20px!important;"><span style="font-size:20px;"><img src="resources/img/2.gif">&nbsp;Bienvenid@ - <b>Iniciar simulación</b></span></div>
	<p><b style="font-size:17px;text-transform: uppercase;">Ingrese el número de simulaciones</b></p>
	<div class="row">
	<form action="#" method="post">
	<div class="col-md-12">
	<input type="text" id="simulaciones" name="simulaciones" placeholder="Número de simulaciones" autocomplete="off"><br><br>
	</div>
	</div>
	<div class="row">
	<div class="col-sm-7 ">
	<input id="button" class="btn btn-success" type="submit" value="Iniciar">
		</div>
	</form>
	</div>

	<div id="resultado"></div>

	</div>
	</div>
	</div>
	</div>
	</div>
	<footer class="footer">
	<div class="container">
	<p class="text-muted">ESTUDIANTES EDUARDO LOSSADA Y MARIEN ZAMBRANO. SECCION N1113. </p>
	</div>
	</footer>


</body>
</html>
