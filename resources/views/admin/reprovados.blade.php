@extends('admin.layout')

@section('content')

<h2 class="txt_pendentes">Trabalhos Reprovados</h2>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table id="listTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Título do TCC</th>
                        <th>Email</th>
                        <th>Download</th>
                        <th>Reenviar token</th>
                        <th>Data de reprovação</th>
                        <th>Reprovado por</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($works as $work)
                    <tr id="{{$work->id}}">
                        <td>{{ $work->title }}</td>
                        <td>{{ $work->user_email }}</td>
                        <td><a href="{{ $work->url }}">Download do arquivo</a><br><a  href="{{ $work->authorization_file }}">Download do termo de autorização</a></td>                        
                        <td><a class="btn btn-danger" data-action="3" href="{{$work->id}}" data-confirm="Deseja realmente reenviar o token?"><span class="glyphicon glyphicon-ok" aria-hidden="true" href="{{ $work->url }}"> Reenviar</span></a></td>
                        <td>{{ $work->updated_at->format('d/m/Y H:i:s') }}</td>
                        <td>{{ $work->user->name }}</td>                        
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

        $('#listTable').DataTable({
            "language": {
                "lengthMenu": "Exibir _MENU_ registros por página",
                "zeroRecords": "Nenhum resultado encontrado",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(Filtrado de _MAX_ registros)",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próxima"
                },
                "search": "Buscar:"
            }
        });
    
        $('#dataConfirmModal').hide();

        $('a[data-confirm]').click(function(ev) {

            resetModal();
            
            var href = $(this).attr('href');
            var action = $(this).attr('data-action');

            $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
            $('#dataConfirmOK').click(function () {
                if (action.length) {
                    manageResource(href, action);
                } else {
                    deleteResource(href);                    
                }
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
                        $('#dataConfirmModal').find('.modal-body').text('Convite reenviado com sucesso!');
                        $('#dataConfirmOK').hide();
                        $('#closeModal').text('Fechar');
                        deleteRow(id);                  
                    } else {
                        $('#dataConfirmModal').find('.modal-body').text('Erro ao reenviar o convite!');
                        $('#dataConfirmOK').hide();
                        $('#closeModal').text('Fechar');
                    }
                }
            });
        }

        function manageResource(id, action) 
        {
            $.ajax({
                type: "POST",
                url: "/gerenciar",
                dataType: 'json',
                data: {resource_id: id, action: action},

                success: function(result) {
                    if (result.status == 1) {
                        $('#dataConfirmModal').find('.modal-body').text(result.message);
                        $('#dataConfirmOK').hide();
                        $('#closeModal').text('Fechar');
                        deleteRow(id);                  
                    } else {
                        $('#dataConfirmModal').find('.modal-body').text(result.message);
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
</script>


@endsection