@extends('admin.layout')

@section('content')
 <h2 class="txt_pendentes">Gerar Token</h2>
	<div class="main_token">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<form class="form_token" name="form_token" method="post" action="/sendtoken">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-md-8">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Digite o email" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

					<div class="form-group">
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-success btn-small">Enviar</button>
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</div>
@endsection