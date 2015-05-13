@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Nuevo usuario</div>
				<div class="panel-body">
					@include('admin.partials.messages')

          			{!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) !!}
          			  
          			    @include('admin.users.partials.fields')
          			    
          			    {!! Form::submit('Crear usuario', ['class' => 'btn btn-default']) !!}
			
          			{!! Form::close()!!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
