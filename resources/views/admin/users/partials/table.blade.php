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
					<a class="btn btn-warning" href="{{ route('admin.users.edit', $user) }}" role="button">Editar</a>
					<a class="btn btn-danger" href="#" role="button">Eliminar</a>
				</td>
			</tr>
		@endforeach
</table>