<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/layout.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
		<title>TCC</title>
	</head>
	
	<body>
		<header>
			<div class="main">
				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
						<h1 class="titulo">Sistema Academico de TCC</h1>
					</div>

					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 login">
						<form name="form_login" id="form_login" method="post" action="">
							<div class="box_login">

								<div class="txt_usuario">
									<input type="text" name="usuario" id="txt_usuario" placeholder="Usuário"/>			
								</div>
								<div class="clear"></div>							
								<div class="txt_senha">
									<input type="password" name="senha" id="txt_senha" placeholder="Senha"/>
								</div>
								<button class="btn_login"><img src="imagens/botoes/login.png" class="imagem"></button>	
							</div>
						</form>
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
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/jquery.cbpFWSlider.min.js"></script>
		<script>
			$( function() {
				/*
				- how to call the plugin:
				$( selector ).cbpFWSlider( [options] );
				- options:
				{
					// default transition speed (ms)
					speed : 500,
					// default transition easing
					easing : 'ease'
				}
				- destroy:
				$( selector ).cbpFWSlider( 'destroy' );
				*/

				$( '#cbp-fwslider' ).cbpFWSlider();

			} );
		</script>
	</body>
</html>