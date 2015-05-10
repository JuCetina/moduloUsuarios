@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Usuarios</div>
				<div class="panel-body">
					<p>
						<a class="btn btn-info" href="{{ route('admin.users.create') }}" role="button">Crear Usuario</a>
					</p>
					<p>{{ $users->total() }} registros encontrados / {{ $users->perPage() }} registros por página</p>
					<table class="table table-striped">
  						<tr>
  							<th>#</th>
  							<th>Nombre</th>
  							<th>Email</th>
  							<th>Tipo</th>
  							<th>Acciones</th>
  						</tr>
  						@foreach($users as $user)
  							<tr>
  								<td>{{ $user->id }}</td>
  								<td>{{ $user->full_name }}</td>
  								<td>{{ $user->email }}</td>
  								<td>{{ $user->type }}</td>
  								<td>
  									<a class="btn btn-warning" href="#" role="button">Editar</a>
  									<a class="btn btn-danger" href="#" role="button">Eliminar</a>
  								</td>
  							</tr>
  						@endforeach
					</table>
					{!! $users->setPath('')->render() !!}
					<p>Página {{ $users->currentPage() }} de {{ $users->lastPage() }}</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
