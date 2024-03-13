@extends('admin.master')

@section('title', 'Configuraciones')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/settings') }}"><i class="fa-solid fa-gears"></i> Configuraciones</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fa-solid fa-gears"></i>Configuraciones</h2>
		</div>
		<div class="inside">
			{!! Form::open(['url' => '/admin/settings' ]) !!}
			<div class="row">
				<div class="col-md-4 ">
					<label for="name">Nombre de la Tienda: </label>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">
							<i class="fa-regular fa-keyboard"></i>
						</span>
						{!! Form::text('name', Config::get('mycms.name'), ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="col-md-4 ">
					<label for="currency">Moneda: </label>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">
							<i class="fa-regular fa-keyboard"></i>
						</span>
						{!! Form::text('currency', Config::get('mycms.currency'), ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="col-md-4 ">
					<label for="company_phone">Telefono: </label>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">
							<i class="fa-regular fa-keyboard"></i>
						</span>
						{!! Form::number('company_phone', Config::get('mycms.company_phone'), ['class' => 'form-control']) !!}
					</div>
				</div>
			</div>

			<div class="row mtop16">
				<div class="col-md-4 ">
					<label for="map">Ubicaciones: </label>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">
							<i class="fa-regular fa-keyboard"></i>
						</span>
						{!! Form::text('map', Config::get('mycms.map'), ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="col-md-3">
					<label for="maintenance_mode">Modo Mantenimiento </label>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">
							<i class="fa-regular fa-keyboard"></i>
						</span>
						{!! Form::select('maintenance_mode', ['0' => 'Desactivado', '1' => 'Activado'], Config::get('mycms.maintenance_mode'), ['class' => 'form-select']) !!}
					</div>
				</div> 


			</div>

			<hr>

			<div class="row mtop16">
				<div class="col-md-4 ">
					<label for="products_per_page">Productos para mostrar por pagina: </label>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">
							<i class="fa-regular fa-keyboard"></i>
						</span>
						{!! Form::number('products_per_page', Config::get('mycms.products_per_page'), ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="col-md-4 ">
					<label for="products_per_page_random">Productos para mostrar por pagina (Random): </label>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">
							<i class="fa-regular fa-keyboard"></i>
						</span>
						{!! Form::number('products_per_page_random', Config::get('mycms.products_per_page_random'), ['class' => 'form-control']) !!}
					</div>
				</div>

			</div>


			<div class="row mtop16">
				<div class="col-md-12">
					{!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
				</div>
			</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection