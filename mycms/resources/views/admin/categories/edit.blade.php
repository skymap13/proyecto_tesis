@extends('admin.master')

@section('title', 'Categorías')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/categories/0') }}">
            <i class="fa-regular fa-folder-open"></i> Categorías
        </a>
    </li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title">
                        <i class="fa-solid fa-edit"></i> Editar Categoría
                    </h2>
                </div>
                <div class="inside">
                	{!! Form::open(['url' => '/admin/category/'.$cat->id.'/edit', 'files' => true]) !!}
                	<label for="name">Nombre de la Categoria: </label>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">
							<i class="fa-regular fa-keyboard"></i>
						</span>
						{!! Form::text('name', $cat->name, ['class' => 'form-control']) !!}
					</div>

					<label for="module" class="mtop16">Modulo: </label>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">
							<i class="fa-regular fa-keyboard"></i>
						</span>
						{!! Form::select('module', getModulesArray(), $cat->module, ['class' => 'form-select']) !!}
					</div>

					<label for="icon" class="mtop16">Icono: </label>
					
					<div class="form-label">
        				{!! Form::file('icon', ['class' => 'form-control', 'id' => 'formFile', 'accept' => 'image/*']) !!}
        				<label class="form-label" for="formFile"></label>
    				</div>

					{!! Form::submit('Guardar', ['class' => 'btn btn-success mtop16']) !!}
                	{!! Form::close() !!}
                </div>
            </div>
        </div>

        @if(!is_null($cat->icono))
        <div class="col-md-3">
        	<div class="panel shadow">
        		<div class="header">
        			<h2 class="title"> <i class="fa-solid fa-edit"></i> Icono</h2>
        		</div>

        		<div class="inside">
        			<img src="{{url('/uploads/'.$cat->file_path.'/'.$cat->icono) }}" class="img-fluid">
        		</div>
        	</div>
        </div>
        @endif

    </div>
</div>
@endsection
