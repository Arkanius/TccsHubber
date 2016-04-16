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
      		<tr>
		        <td>{{ $user->name }}</td>
		        <td>{{ $user->email }}</td>
		        <td>{{ $user->role == 1 ? 'Administrador' : 'Usuário' }}</td>
		        <td>
		        	<a class="btn btn-success" href="{{$user->id}}">Editar</a>
		        	<a class="btn btn-danger" href="{{$user->id}}">Excluir</a>
		        </td>
      		</tr>
		@endforeach
    </tbody>
  </table>
</div>

@endsection
