@extends('admin.master')

@section('title', 'Usuarios')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/users') }}"><i class="fa-solid fa-user-group"></i> Usuarios</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fa-solid fa-user-group"></i></i> Usuarios</h2>
		</div>

		<div class="inside">
			<div class="row">
			    <div class="col-md-2 offset-md-10">
			        <div class="dropdown">
			            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100%">
			                <i class="fa-solid fa-filter"></i> Filtrar
			            </button>
			            
			            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			                <a class="dropdown-item" href="{{ url('/admin/users/all') }}"><i class="fa-solid fa-list"></i> Todos</a>
			                <a class="dropdown-item" href="{{ url('/admin/users/0') }}"><i class="fa-solid fa-ban"></i> No Verificados</a>
			                <a class="dropdown-item" href="{{ url('/admin/users/1') }}"><i class="fa-solid fa-user-check"></i> Verificados</a>
			                <a class="dropdown-item" href="{{ url('/admin/users/100') }}"><i class="fa-solid fa-user-xmark"></i> Suspendidos</a>
			            </div>
			        </div>
			    </div>
			</div>

			<table class="table mtop16">
				<thead>
					<tr>
						<td>ID</td>
						<td></td>
						<td>Nombre</td>
						<td>Apellido</td>
						<td>Email</td>
						<td>Rol</td>
						<td>Estado</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td width="64">
							@if(is_null($user->avatar))
								<img src="{{ url('/static/imagenes/default-avatar.png')}}" class="img-fluid rounded-circle">
							@else
								<img src="{{ url('/uploads_users/'.$user->id.'/'.$user->avatar)}}" class="img-fluid rounded-circle">
							@endif
						</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->lastname }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ getRoleUserArray(null, $user->role) }}</td>
						<td>{{ getUsersStatusArray(null, $user->status) }}</td>
						<td>
							<div class="opts">
								@if(kvfj(Auth::user()->permissions, 'user_edit'))
								<a href="{{ url('/admin/user/'.$user->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
									<i class="fa-solid fa-pen-to-square"></i>
								</a>
								@endif
								@if(kvfj(Auth::user()->permissions, 'user_permissions'))
								<a href="{{ url('/admin/user/'.$user->id.'/permissions') }}" data-toggle="tooltip" data-placement="top" title="Permisos de Usuario">
									<i class="fa-solid fa-user-gear"></i>
								</a>
								@endif
							</div>
						</td>
					</tr>
					@endforeach
					<tr>
						<td colspan="7">{!! $users->render() !!}</td>
					</tr>
				</tbody>
			</table>

		</div>
	</div>
</div>
@endsection