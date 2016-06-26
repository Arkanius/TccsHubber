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
                @if ($currentCourse != '')
                    @foreach ($currentCourse as $course)
                        <h3 class="txt_postagens">Ultimos TCC's adicionados em {{ $course->name }}</h3>
                    @endforeach
                @else
					<h3 class="txt_postagens">Ultimos TCC's adicionados</h3>
                @endif
					@foreach ($works as $work)
						<div class="row" id="works_list">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box_tcc">
								<a href="{{url('/')}}/visualizar/{{$work->id}}">{{ $work->title }}</a>
								<spam class="txt_curso">{{ $work->description}}</spam>
							</div>
						</div>
					@endforeach
                    <input type="hidden" id="page" value="2"/> 
				</div>
			</article>
		</div>
		<div class="clear"></div>

		<script src="{{url('/')}}/js/jquery.js"></script>
		<script>
		$(document).ready(function() {

            $(window).scroll(function() {
                var page = parseInt($('#page').val());

                if($(window).scrollTop() + $(window).height() == $(document).height()) {
                    getContents(page, getLastUrlArgument());
			    }
			});
    	});


        function getContents(page, course_id)
        {
            $.ajax({
                type: "GET",
                url: "/paginate",
                dataType: 'json',
                data: {page: page, course: course_id},
                
                success: function(result) {
                    $('#works_list').last().append(result.content);
                    $('#page').val(parseInt(result.nextPage));
                }

            });
        }

        function getLastUrlArgument()
        {
            var url = window.location.href;
            var lastArgument = url.split('/');

            return lastArgument.pop();
        }

    	</script>
@stop
