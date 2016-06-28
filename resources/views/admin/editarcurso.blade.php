@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Curso</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/editar-curso') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ $course->name }}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('coordinator') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Coordenador</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="coordinator" value="{{ $course->coordinator }}" required>

                                @if ($errors->has('coordinator'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('coordinator') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <label class="col-md-4 control-label">Ativar curso</label>

                            <div class="col-md-8">
                                <input type="checkbox" name="status" value="1"  {{ $course->status == 1 ?  "disabled checked" : "" }}>
                            </div>

                        <input type="hidden" value="{{ $course->id }}" name="course_id">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
