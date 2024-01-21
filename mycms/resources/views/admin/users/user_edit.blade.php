@extends('admin.master')

@section('title', 'Editar Usuarios')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/users') }}"><i class="fa-solid fa-user-group"></i> Usuarios</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="page_user">
		<div class="row">

			<div class="col-md-4">
				<div class="panel shadow">
					<div class="header">
						<h2 class="title"><i class="fa-solid fa-user"></i> Información</h2>
					</div>

					<div class="inside">
						<div class="mini_profile">
							@if(is_null($u->avatar))
								<img src="{{ url('/static/imagenes/default-avatar.png')}}" class="avatar">
							@else
								<img src="{{ url('/static/uploads/user/'.$u->id.'/'.$users->avatar)}}" class="avatar">
							@endif
							<div class="info">
								<span class="title"> <i class="fa-regular fa-id-card"></i> Nombre:</span>
								<span class="text">{{ $u->name }} {{ $u->lastname }}</span>
								<span class="title"><i class="fa-solid fa-user-tie"></i> Estado de Usuario:</span>
								<span class="text">{{ getUsersStatusArray(null, $u->status) }}</span>
								<span class="title"><i class="fa-solid fa-envelope"></i> Correo Electronico:</span>
								<span class="text">{{ $u->email }}</span>
								<span class="title"><i class="fa-regular fa-calendar-days"></i> Fecha de Registro:</span>
								<span class="text">{{ $u->created_at }}</span>
								<span class="title"><i class="fa-solid fa-user-shield"></i> Rol de Usuario:</span>
								<span class="text">{{ getRoleUserArray(null, $u->role) }}</span>
							</div>
							@if(kvfj(Auth::user()->permissions, 'user_banned'))
								@if($u->status == "100")
								<a href="{{ url('/admin/user/'.$u->id.'/banned') }}" class="btn btn-success mtop16"> Activar Usuario</a>
								@else
								<a href="{{ url('/admin/user/'.$u->id.'/banned') }}" class="btn btn-danger mtop16"> Suspender Usuario</a>
								@endif
							@endif
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-8">
				<div class="panel shadow">
					<div class="header">
						<h2 class="title"><i class="fa-solid fa-user-pen"></i> Editar Información</h2>
					</div>

					<div class="inside">
						@if(kvfj(Auth::user()->permissions, 'user_edit'))
						{!! Form::open(['url' => '/admin/user/'.$u->id.'/edit']) !!}
						<div class="row">

							<div class="col-md-6">
								<label for="module" >Tipo de usuario: </label>
								<div class="input-group mb-3">
									<span class="input-group-text" id="basic-addon1">
									<i class="fa-regular fa-keyboard"></i>
									</span>
								{!! Form::select('user_type', getRoleUserArray('list', null), $u->role, ['class' => 'form-select']) !!}
								</div>
							</div>

						</div>

						<div class="row mtop16">
							<div class="col-md-12">
								{!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
							</div>
						</div>
						{!! Form::close() !!}
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection