<table class="table table-striped">
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Tipo</th>
			<th></th>
			<th></th>
		</tr>
		@foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->full_name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->type }}</td>
				<td><a class="btn btn-warning" href="{{ route('admin.users.edit', $user) }}" role="button">Editar</a></td>
				<td>
					@include('admin.users.partials.delete')
				</td>
			</tr>
		@endforeach
</table>