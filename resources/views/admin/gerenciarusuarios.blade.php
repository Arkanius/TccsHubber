@extends('admin.layout')

@section('content')

<div class="container">
  <h2>Adicionar</h2>
  <p>Clique para adicionar um usuário</p>      
  <a class="btn btn-default glyphicon glyphicon-hand-up" href="/cadastrar"></a>
</div>

<div class="container">
  <h2>Usuários cadastrados</h2>
  <p>Usuários cadastrados no sistema</p>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Email</th>
        <th>Tipo de acesso</th>
        <th>Gerenciar</th>
      </tr>
    </thead>
    <tbody>
    	@foreach ($users as $user)
      		<tr id="{{$user->id}}">
		        <td>{{ $user->name }}</td>
		        <td>{{ $user->email }}</td>
		        <td>{{ $user->role == 1 ? 'Administrador' : 'Usuário' }}</td>
		        <td>
		        	<a class="btn btn-success" href="{{$user->id}}">Editar</a>
		        	<a class="btn btn-danger" href="{{$user->id}}" data-confirm="Deseja realmente excluir o usuário?">Excluir</a>
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
	
	$('#dataConfirmModal').hide();

	$('a[data-confirm]').click(function(ev) {

		resetModal();
		
		var href = $(this).attr('href');

		$('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
		$('#dataConfirmOK').click(function () {
			deleteUser(href);
		});
		//$('#dataConfirmOK').attr('href', href);
		$('#dataConfirmModal').modal({show:true});
		return false;
	});

	function deleteUser(id) 
	{
		$.ajax({
			type: "POST",
			url: "/deleteuser",
			dataType: 'json',
            data: {user_id: id},

            success: function(result) {
            	if (result == 1) {
            		$('#dataConfirmModal').find('.modal-body').text('Usuário excluído com sucesso!');
            		$('#dataConfirmOK').hide();
            		$('#closeModal').text('Fechar');
            		deleteRow(id);
            		
            	} else {
            		$('#dataConfirmModal').find('.modal-body').text('Este usuário não pode ser excluído!');
            		$('#dataConfirmOK').hide();
            		$('#closeModal').text('Fechar');
            	}
            }
		});
	}
});


	function deleteRow(id) 
	{
		var killrow = $('tr[id="'+id+'"]'); console.log(killrow);
		killrow.fadeOut(500, function(){
			killrow.remove();
		});
	}

	function resetModal()
	{
		$('#dataConfirmOK').show();
	}

</script>

@endsection
