@extends('layout')

@section('content')

		<div class="clear"></div>

		<div class="main">

			<nav class="row">
				@foreach ($courses as $course)
					<center>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
							<a class="btn_ads btn_orange" href="/curso/{{ $course->id }}">{{ $course->name }}</a>
						</div>
					</center>
				@endforeach
				</center>
			</nav>

			<article>

				<div id="cbp-fwslider" class="cbp-fwslider">
					<ul>
						<li><a href="#"><img src="{{url('/')}}/imagens/slider/1.jpg" alt="img01"/></a></li>
						<li><a href="#"><img src="{{url('/')}}/imagens/slider/1.jpg" alt="img02"/></a></li>
						<li><a href="#"><img src="{{url('/')}}/imagens/slider/1.jpg" alt="img03"/></a></li>
						<li><a href="#"><img src="{{url('/')}}/imagens/slider/1.jpg" alt="img04"/></a></li>
						<li><a href="#"><img src="{{url('/')}}/imagens/slider/1.jpg" alt="img05"/></a></li>
					</ul>
				</div>

				<div class="clear"></div>

				<h3 class="txt_postagens">Ultimos TCC's adicionados</h3>

				@foreach ($works as $work)
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box_tcc">
							<a href="{{url('/')}}/visualizar/{{$work->id}}">{{ $work->theme }}</a>
							<spam class="txt_curso">{{ $work->name}}</spam>
						</div>
					</div>
				@endforeach
			</article>
		</div>
		<div class="clear"></div>
@stop