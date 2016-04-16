@extends('admin.layout')

@section('content')

<h2 class="txt_pendentes">Trabalhos Pendentes</h2>

    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Tema do TCC</th>
                <th>Email</th>
                <th>Data de envio</th>
                <th>Conteudo</th>

            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Sistema de arquivamento de TCC</th>
                <th>vtr.gomes@hotmail.com</th>
                <th>08/04/2016</th>
                <th>Link para o download</th>
            </tr>
        </tfoot>
    </table>

@endsection