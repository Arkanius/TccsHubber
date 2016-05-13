@extends('admin.layout')

@section('content')

<h2 class="txt_pendentes">Trabalhos Reprovados</h2>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Título do TCC</th>
                        <th>Email</th>
                        <th>Download</th>
                        <th>Reenviar token</th>
                        <th>Data de reprovação</th>
                        <th>Reprovado por</th>
                        <th>Aprovar</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($works as $work)
                    <tr id="{{$work->id}}">
                        <td>{{ $work->title }}</td>
                        <td>{{ $work->user_email }}</td>
                        <td><a href="{{ $work->url }}">Download</td>
                        <td><a class="btn btn-success"  <span class="glyphicon glyphicon-ok" aria-hidden="true" href="{{ $work->url }}">Reenviar</td>
                        <td>{{ $work->updated_at->format('d/m/Y H:i:s') }}</td>
                        <td>{{ $work->user->name }}</td>                        
                        <td><button class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Aprovar</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection