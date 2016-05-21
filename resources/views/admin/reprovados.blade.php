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
                        <td><a class="btn btn-danger" href="{{$work->id}}" data-confirm="Deseja realmente reenviar o token?"><span class="glyphicon glyphicon-ok" aria-hidden="true" href="{{ $work->url }}"> Reenviar</span></a></td>
                        <td>{{ $work->updated_at->format('d/m/Y H:i:s') }}</td>
                        <td>{{ $work->user->name }}</td>                        
                        <td><button class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Aprovar</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

<div id="dataConfirmModal" class="modal fade" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="dataConfirmLabel">Confirmar</h3>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true" id="closeModal">Cancel</button>
                <a class="btn btn-primary" id="dataConfirmOK">OK</a>
            </div>
        </div>
    </div>
</div>

<script>

$(document).ready(function() {
    
        $('#dataConfirmModal').hide();

        $('a[data-confirm]').click(function(ev) {

            resetModal();
            
            var href = $(this).attr('href');

            $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
            $('#dataConfirmOK').click(function () {
                deleteResource(href);
            });
            $('#dataConfirmModal').modal({show:true});
            return false;
        });

        function deleteResource(id) 
        {
            $.ajax({
                type: "POST",
                url: "/resendtoken",
                dataType: 'json',
                data: {resource_id: id},

                success: function(result) {
                    if (result == 1) {
                        $('#dataConfirmModal').find('.modal-body').text('Token reenviado com sucesso!');
                        $('#dataConfirmOK').hide();
                        $('#closeModal').text('Fechar');
                        deleteRow(id);                  
                    } else {
                        $('#dataConfirmModal').find('.modal-body').text('Erro ao reenviar o token!');
                        $('#dataConfirmOK').hide();
                        $('#closeModal').text('Fechar');
                    }
                }
            });
        }
    });

    function deleteRow(id) 
    {
        var killrow = $('tr[id="'+id+'"]');
        killrow.remove();
    }

    function resetModal()
    {
        $('#dataConfirmOK').show();
    }


/*
    function resendToken(id) 
    {
        alert(id);return;
        $.ajax({
            type: "POST",
            url: "/resendtoken",
            dataType: 'json',
            data: {resource_id: id},

            success: function(result) {
                if (result == 1) {
                    $('#dataConfirmModal').find('.modal-body').text('Curso inabilitado com sucesso!');
                    $('#dataConfirmOK').hide();
                    $('#closeModal').text('Fechar');
                    deleteRow(id);                  
                } else {
                    $('#dataConfirmModal').find('.modal-body').text('Erro ao excluir o curso!');
                    $('#dataConfirmOK').hide();
                    $('#closeModal').text('Fechar');
                }
            }
        });
    }


    function deleteRow(id) 
    {
        var killrow = $('tr[id="'+id+'"]');
        killrow.children('td[name="status"]').text('Inativo');
    }

    function resetModal()
    {
        $('#dataConfirmOK').show();
    }
*/
</script>


@endsection