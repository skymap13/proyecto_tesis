@extends('connect.master')

@section('title','Registrarse')

@section('content')

<div class="box box_register shadow">
	<div class="header">
		<a href="{{ url('/') }}">
			<img src="{{ url('/static/imagenes/logo.png') }}">
		</a>
	</div>
	<div class="inside">
		{!! Form::open(['url' => '/register']) !!}

		<label for="name" class="mtop16">Nombre:</label>
	    <div class="input-group">
	    		<div class="input-group-text"><i class="fa-solid fa-user"></i></div>
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>

		<label for="lastname" class="mtop16">Apellido:</label>
	    <div class="input-group">
	    		<div class="input-group-text"><i class="fa-regular fa-user"></i></div>
			{!! Form::text('lastname', null, ['class' => 'form-control']) !!}
		</div>

		<label for="email" class="mtop16">Correo Electrónico:</label>
	    <div class="input-group">
	    		<div class="input-group-text"><i class="fa-regular fa-envelope-open"></i></div>
			{!! Form::text('email', null, ['class' => 'form-control']) !!}
		</div>

		<label for="password" class="mtop16">Contraseña:</label>
		<div class="input-group">
	    		<div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
			{!! Form::password('password', ['class' => 'form-control']) !!}
		</div>

		<label for="cpassword" class="mtop16">Confirmar Contraseña:</label>
		<div class="input-group">
	    		<div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
			{!! Form::password('cpassword', ['class' => 'form-control']) !!}
		</div>

		{!! Form::submit('Registrarse', ['class' => 'btn btn-success mtop16']) !!}
		{!! Form::close() !!}

		@if(Session::has('message') )
		<div class="container">
				<div class="mtop16 alert alert-{{ Session::get('typealert') }} " style="display:none;"> 
					{{ Session::get('message') }}
					@if ($errors->any())
					<ul>
						@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
					@endif
					<script>
						$('.alert').slideDown();
						setTimeout(function(){ $('.alert').slideUp(); }, 10000);
					</script>
				</div>
			</div>
		@endif

		<div class="footer mtop16">
			<a href="{{ url('/login') }}">Ya tengo una cuenta, Ingresar</a>
		</div>	
	</div>

	


</div>

@stop