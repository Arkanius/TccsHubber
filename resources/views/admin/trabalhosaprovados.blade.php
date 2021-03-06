@extends('admin.layout')

@section('content')

<h2 class="txt_pendentes">Trabalhos Aprovados</h2>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table id="listTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Tema do TCC</th>
                        <th>Email</th>
                        <th>Data de envio</th>
                        <th>Download</th>
                        <th>Reprovar</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($works as $work)
                    <tr id="{{$work->id}}">
                        <td>{{ $work->title }}</td>
                        <td>{{ $work->user_email }}</td>
                        <td>{{ $work->created_at->format('d/m/Y H:i:s') }}</td>
                        <td><a href="{{ $work->url }}">Download do arquivo</a><br><a  href="{{ $work->authorization_file }}">Download do termo de autorização</a></td>                        
                        <td><a class="btn btn-danger" href="{{$work->id}}" data-confirm="Deseja realmente reprovar o trabalho?" data-action="2"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Deletar</span></a></td>
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
            
            var id     = $(this).attr('href');
            var action = $(this).attr('data-action');

            $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
            $('#dataConfirmOK').click(function () {
                manageResource(id, action);
            });
            $('#dataConfirmModal').modal({show:true});
            return false;
        });

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