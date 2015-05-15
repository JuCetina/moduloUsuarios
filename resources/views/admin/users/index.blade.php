@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Usuarios</div>
				@if(Session::has('message'))
					<p class="alert alert-success">{{ Session::get('message') }}</p>
				@endif
				<div class="panel-body">
					{!! Form::open(['route' => 'admin.users.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
						<div class="form-group">
							{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de usuario']) !!}
						</div>
						<button type="submit" class="btn btn-default">Buscar</button>
					{!! Form::close() !!}
					<p>
						<a class="btn btn-info" href="{{ route('admin.users.create') }}" role="button">Crear Usuario</a>
					</p>
					<p>{{ $users->total() }} registros encontrados / {{ $users->perPage() }} registros por página</p>

					@include('admin.users.partials.table')
          
					{!! $users->setPath('')->render() !!}
					<p>Página {{ $users->currentPage() }} de {{ $users->lastPage() }}</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
