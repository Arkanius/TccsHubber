@extends('admin.layout')

@section('content')

<h2 class="txt_pendentes">Trabalhos Pendentes</h2>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Tema do TCC</th>
                        <th>Email</th>
                        <th>Data de envio</th>
                        <th>Download</th>
                        <th>Aprovar</th>
                        <th>Reprovar</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($works as $work)
                    <tr id="{{$work->id}}">
                        <td>{{ $work->theme }}</td>
                        <td>{{ $work->user_email }}</td>
                        <td>{{ $work->created_at->format('d/m/Y H:i:s') }}</td>
                        <td><a href="{{ $work->url }}">Download</td>
                        <td><button class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Aprovar</button></td>
                        <td><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Reprovar</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection