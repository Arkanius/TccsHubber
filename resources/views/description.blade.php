@extends('layout')

@section('content')
	@foreach ($works as $work)
		<div class="row main">
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

				<fieldset class="borda">
					<legend> Tema: </legend>
					{{ $work->title }}
				</fieldset>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

				<fieldset class="borda">
					<legend> Data da aprovação: </legend>
					{{ $work->created_at->format('d/m/Y') }}
				</fieldset>
			</div>
		</div>

		<div class="row main">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<fieldset class="borda">
					<legend> Nomes: </legend>
					{{ $work->authors }}
				</fieldset>

				<fieldset class="borda">
					<legend> Orientador: </legend>
					{{ $work->advisor }}
				</fieldset>

				<fieldset class="borda">
					<legend>Banca:</legend>
					{{ $work->examiners }}
				</fieldset>

				<fieldset class="borda">
					<legend>Descrição:</legend>
					{{ $work->description }}
				</fieldset>	
			</div>
		</div>

		<br><br><center><a class="btn btn-primary txt_download" href="{{url('/').'/'.$work->url}}">Faça o download do TCC</a></center><br><br>
	@endforeach
@stop