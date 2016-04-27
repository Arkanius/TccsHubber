@extends('admin.layout')

@section('content')

<h2 class="txt_pendentes">Trabalhos Pendentes</h2>

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
        <tfoot>
            <tr>
                <th>Sistema de arquivamento de TCC</th>
                <th>vtr.gomes@hotmail.com</th>
                <th>08/04/2016</th>
                <th><a href="#">Link para o download</a></th>
                <th><button class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Aprovar</button></th>
                <th><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Reprovar</button></th>
            </tr>
        </tfoot>
    </table>

@endsection