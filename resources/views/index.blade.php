@extends('layout')

@section('content')

		<div class="clear"></div>

		<div class="main">

			<nav class="row">
				<center>
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 teste">
						<button class="btn_ads btn_orange"><a href="ads.html">A.D.S</a></button>
					</div>
				</center>

				<center>
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
						<button class="btn_ads btn_orange"><a href="jogos.html">JOGOS</a></button>
					</div>
				</center>

				<center>
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
						<button class="btn_ads btn_orange"><a href="secretariado.html">SECRETÁRIADO</a></button>
					</div>
				</center>

				<center>
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
						<button class="btn_ads btn_orange"><a href="seguranca.html">SEGURANÇA</a></button>
					</div>
				</center>
			</nav>

			<article>

				<div id="cbp-fwslider" class="cbp-fwslider">
					<ul>
						<li><a href="#"><img src="imagens/slider/1.jpg" alt="img01"/></a></li>
						<li><a href="#"><img src="imagens/slider/1.jpg" alt="img02"/></a></li>
						<li><a href="#"><img src="imagens/slider/1.jpg" alt="img03"/></a></li>
						<li><a href="#"><img src="imagens/slider/1.jpg" alt="img04"/></a></li>
						<li><a href="#"><img src="imagens/slider/1.jpg" alt="img05"/></a></li>
					</ul>
				</div>

				<div class="clear"></div>

				<h3 class="txt_postagens">Ultimos TCC's adicionados</h3>

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box_tcc">
						<a href="#">Aqui fica o nome do tema do TCC</a>
						<spam class="txt_curso">Curso: Aqui fica o nome do curso</spam>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box_tcc">
						<a href="#">Aqui fica o nome do tema do TCC</a>
						<spam class="txt_curso">Curso: Aqui fica o nome do curso</spam>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box_tcc">
						<a href="#">Aqui fica o nome do tema do TCC</a>
						<spam class="txt_curso">Curso: Aqui fica o nome do curso</spam>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box_tcc">
						<a href="#">Aqui fica o nome do tema do TCC</a>
						<spam class="txt_curso">Curso: Aqui fica o nome do curso</spam>
					</div>
				</div>
			</article>
		</div>

		<div class="clear"></div>
@stop