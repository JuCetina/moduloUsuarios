{!! Form::open(['route' => ['admin.users.destroy', $user], 'method' => 'DELETE']) !!}
	 {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}