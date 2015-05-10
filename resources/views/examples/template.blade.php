@extends('examples.layout')

@section('title')
	Practicando con Laravel 5
@stop

@section('content')
	<h1>Práctica Laravel 5</h1>
	<p>
		@if(isset($user))
			Bienvenido {{ $user }}
		@else
			[Login]
		@endif
	</p>
@stop

@section('footer')
	2015. Todos los derechos reservados
@stop
