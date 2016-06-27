<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link href='{{url('/')}}/css/font.css' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/layout.css">
		<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/default.css" />
		<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/component.css" />
		<link rel="shortcut icon" href="{{url('/')}}/favicon.ico">
		<script src="{{url('/')}}/js/modernizr.custom.js"></script>
		<title>TCC</title>
	</head>
	
	<body>
		<header class="">
			<div class="main">
				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
						<a href="index.html"><h1 class="titulo">Sistema Academico de TCC</h1></a>
					</div>
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<button class="btn btn-success termo"><a href="{{url('/')}}/uploads/termo-de-autorizacao.pdf">TERMO DE AUTORIZAÇÃO</a></button>
					</div>	
				</div>
			</div>
		</header>

		@yield('content')

		<footer>
			<div class="footer">
				<spam class="copyright">Fatec São Caetano do Sul todos os direitos reservados © </spam>
			</div>
		</footer>
		<script src="{{url('/')}}/js/jquery.js"></script>
		<script src="{{url('/')}}/js/jquery.cbpFWSlider.min.js"></script>
	</body>
</html>