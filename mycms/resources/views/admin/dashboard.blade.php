@extends('admin.master')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">
	@if(kvfj(Auth::user()->permissions, 'dashboard_small_stats'))
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fa-solid fa-chart-simple"></i> Estadisticas rapidas.</h2>
		</div>
	</div>

	<div class="row mtop16">
		<div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fa-solid fa-users"></i> Usuarios Registrados.</h2>
				</div>
				<div class="inside">
					<div class="big_count">{{ $user }}</div>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fa-solid fa-list-check"></i> Productos Listados.</h2>
				</div>
				<div class="inside">
					<div class="big_count">{{ $products }}</div>
				</div>
			</div>
		</div>

		@if(kvfj(Auth::user()->permissions, 'dashboard_sell_today'))
		<div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fa-solid fa-boxes-packing"></i> Ordenes hoy.</h2>
				</div>
				<div class="inside">
					<div class="big_count">0</div>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fa-solid fa-industry"></i> Facturado hoy.</h2>
				</div>
				<div class="inside">
					<div class="big_count">0</div>
				</div>
			</div>
		</div>
		@endif

		
	</div>

	@endif
</div>

@endsection