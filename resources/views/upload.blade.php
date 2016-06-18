@extends('layout')

@section('content')

		<div class="clear"></div>

		<div class="main">
			<article>
				<form role="form" method="POST" action="{{ url('/upload') }}" enctype="multipart/form-data">

					<fieldset class="form-group">
						<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label>Título do TCC*</label>
                            <div>
				    			<input type="text" name="title" class="form-control"  value="{{ old('title') }}" required placeholder="Digite aqui">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
	                	</div>
  					</fieldset>

					<fieldset class="form-group">
						<div class="form-group{{ $errors->has('member') ? ' has-error' : '' }}">
						    <label>Integrante 1 *</label>
						    <div>						    	
							    <input type="text" name="member[]" class="form-control" value="{{ old('member') }}" required placeholder="Digite aqui">
							    <small class="text-muted">É necessário ao menos 1 integrante.</small>
							     @if ($errors->has('member'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('member') }}</strong>
                                    </span>
                                @endif
						    </div>
	                	</div>
  					</fieldset>

					<fieldset class="form-group">
						<div class="form-group{{ $errors->has('member') ? ' has-error' : '' }}">
						    <label>Integrante 2</label>
						    <div>						    	
							    <input type="text" name="member[]" class="form-control" value="{{ old('member') }}" placeholder="Digite aqui">
							     @if ($errors->has('member'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('member') }}</strong>
                                    </span>
                                @endif
						    </div>
	                	</div>
  					</fieldset>

  					<fieldset class="form-group">
						<div class="form-group{{ $errors->has('member') ? ' has-error' : '' }}">
						    <label>Integrante 3</label>
						    <div>						    	
							    <input type="text" name="member[]" class="form-control" value="{{ old('member') }}" placeholder="Digite aqui">
							     @if ($errors->has('member'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('member') }}</strong>
                                    </span>
                                @endif
						    </div>
	                	</div>
  					</fieldset>

  					<fieldset class="form-group">
						<div class="form-group{{ $errors->has('member') ? ' has-error' : '' }}">
						    <label>Integrante 4</label>
						    <div>						    	
							    <input type="text" name="member[]" class="form-control" value="{{ old('member') }}" placeholder="Digite aqui">
							     @if ($errors->has('member'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('member') }}</strong>
                                    </span>
                                @endif
						    </div>
	                	</div>
  					</fieldset>

					<fieldset class="form-group">
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					    	<label>E-mail do responsável *</label>
						    <div>						    	
							    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required placeholder="Digite aqui">
							     @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
						    </div>
	                	</div>
  					</fieldset>

					<fieldset class="form-group">
						<div class="form-group{{ $errors->has('advisor') ? ' has-error' : '' }}">
					    	<label>Orientador *</label>
						    <div>						    	
							    <input type="text" name="advisor" class="form-control" value="{{ old('advisor') }}" required placeholder="Digite aqui">
							     @if ($errors->has('advisor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('advisor') }}</strong>
                                    </span>
                                @endif
						    </div>
	                	</div>
  					</fieldset>

					<fieldset class="form-group">
						<div class="form-group{{ $errors->has('examiner') ? ' has-error' : '' }}">
					    	<label>Avaliador 1 *</label>
						    <div>						    	
							    <input type="text" name="examiner[]" class="form-control" value="{{ old('examiner') }}" required placeholder="Digite aqui">
							     @if ($errors->has('examiner'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('examiner') }}</strong>
                                    </span>
                                @endif
						    </div>
	                	</div>
  					</fieldset>

					<fieldset class="form-group">
						<div class="form-group{{ $errors->has('examiner') ? ' has-error' : '' }}">
					    	<label>Avaliador 2 *</label>
						    <div>						    	
							    <input type="text" name="examiner[]" class="form-control" value="{{ old('examiner') }}" required placeholder="Digite aqui">
							     @if ($errors->has('examiner'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('examiner') }}</strong>
                                    </span>
                                @endif
						    </div>
	                	</div>
  					</fieldset>

					<fieldset class="form-group">
						<div class="form-group{{ $errors->has('examiner') ? ' has-error' : '' }}">
					    	<label>Avaliador 3 *</label>
						    <div>						    	
							    <input type="text" name="examiner[]" class="form-control" value="{{ old('examiner') }}" required placeholder="Digite aqui">
							     @if ($errors->has('examiner'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('examiner') }}</strong>
                                    </span>
                                @endif
						    </div>
	                	</div>
  					</fieldset>

					<fieldset class="form-group">
						<div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
					    	<label>Data da apresentação *</label>
						    <div>						    	
							    <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
							     @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
						    </div>
	                	</div>
  					</fieldset>

					<fieldset class="form-group">
						<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
					    	<label>Escreva um pequeno resumo sobre o trabalho.</label>
						    <div>						    	
					    		<textarea class="form-control" name="description" rows="3" value="{{ old('description') }}" required placeholder="Digite aqui"></textarea>
							     @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
						    </div>
	                	</div>
  					</fieldset>

  					<fieldset class="form-group">
						<div class="form-group{{ $errors->has('trabalho') ? ' has-error' : '' }}">
					    	<label>Carregue seu TCC (apenas PDF)</label>
						    <div>
					    		<input type="file" name="work" class="form-control-file">
						    	@if ($errors->has('trabalho'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('trabalho') }}</strong>
                                    </span>
                                @endif
						    </div>
						</div>
  					</fieldset>

  					<fieldset class="form-group">
						<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
						    <label>Carregue a imagem do seu termo de autorização</label>
						    <div>
						    	<input type="file" name="authorization" class="form-control-file">
						    	@if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
						    </div>
						</div>
  					</fieldset>

  					{{ csrf_field() }}
  					<button type="submit" class="btn btn-primary">Enviar</button>
				</form>
			</article>
		</div>

		<div class="clear"></div>
@stop