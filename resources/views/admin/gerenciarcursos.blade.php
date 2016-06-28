@extends('admin.layout')

@section('content')

<div class="container">
  <h2>Adicionar</h2>
  <p>Clique para adicionar um curso</p>      
  <a class="btn btn-default glyphicon glyphicon-plus" href="/cadastrar-curso"></a>
</div>

<div class="container">
  <h2>Cursos cadastrados</h2>
  <table class="table table-hover" id="listTable">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Coordenador</th>
        <th>Status</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
    	@foreach ($courses as $course)
      		<tr id="{{$course->id}}">
		        <td>{{ $course->name }}</td>
		        <td>{{ $course->coordinator }}</td>
		        <td name="status">{{ $course->status == 1 ? 'Ativo' : 'Inativo' }}</td>
		        <td>
		        	<a class="btn btn-success" href="/editar-curso/{{$course->id}}">Editar</a>
		        	@if ($course->status == 0)
		        		<a id="btn_disable" data-confirm="Deseja realmente inabilitar o curso?" class="btn btn-danger disabled" href="{{$course->id}}">Desabilitar</a>
		        	@else
		        		<a id="btn_disable" data-confirm="Deseja realmente inabilitar o curso?" class="btn btn-danger" href="{{$course->id}}">Desabilitar</a>
		        	@endif
		        </td>
      		</tr>
		@endforeach
    </tbody>
  </table>
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
				url: "/deletecourse",
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
	});

	function deleteRow(id) 
	{
		var killrow = $('tr[id="'+id+'"]');
		killrow.children('td[name="status"]').text('Inativo');
		killrow.find('#btn_disable').attr('disabled', true);
	}

	function resetModal()
	{
		$('#dataConfirmOK').show();
	}

</script>

@endsection
