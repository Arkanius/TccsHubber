@extends('layout')

@section('content')

		<div class="clear"></div>

		<div class="main">

			<nav class="row">
				@foreach ($courses as $course)
					<center>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
							<a href="/curso/{{ $course->id }}"><button class="btn_analise btn_orange">{{ $course->name }}</button></a>
						</div>
					</center>
				@endforeach
				</center>
			</nav>

			<article>
				<div class="clear"></div>
				<div class="banner">
					<img src="{{url('/')}}/imagens/slider/1.jpg" alt="img01"/>
				</div>

				<div class="pesquisar">
					<form name="form_pesquisar" class="form_pesquisar" role="form" method="POST" action="{{ url('/pesquisa') }}">
						<h2 class="txt_busca">Faça sua busca!</h2>
						<center>
							<input type="text" name="item" id="txt_pesquisa" placeholder="Digite aqui" />
							<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
						</center>
					</form>
				</div>

				<div class="clear"></div>

				<div class="main">
					<h3 class="txt_postagens">Resultados da busca</h3>
					@foreach ($works as $work)
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box_tcc">
								<a href="{{url('/')}}/visualizar/{{$work->id}}">{{ $work->title }}</a>
								<spam class="txt_curso">{{ $work->description}}</spam>
							</div>
						</div>
					@endforeach
				</div>
			</article>
		</div>
		<div class="clear"></div>
@stop
