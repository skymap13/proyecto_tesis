@extends('admin.master')

@section('title', 'Listado Sliders')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/sliders') }}"><i class="fa-regular fa-images"></i> Sliders</a>
</li>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if(kvfj(Auth::user()->permissions, 'slider_edit'))
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title">
                        <i class="fa-regular fa-pen-to-square"></i> Editar Sliders
                    </h2>
                </div>
                <div class="inside">
                	{!! Form::open(['url' => '/admin/slider/'.$slider->id.'/edit']) !!}
                	<label for="name">Nombre del Slider: </label>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">
							<i class="fa-regular fa-keyboard"></i>
						</span>
						{!! Form::text('name', $slider->name, ['class' => 'form-control']) !!}
					</div>

					<label for="module" >Visible: </label>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">
							<i class="fa-regular fa-keyboard"></i>
						</span>
						{!! Form::select('visible', ['0' => 'No Visible', '1' => 'Visible'] , $slider->status, ['class' => 'form-select']) !!}
					</div>

					<label for="icon" >Imagen Destacada: </label>
					<div class="row">
						<div class="col-md-4">
							<div class="input-group mb3 mtop16" >
								<img src=" {{ url('/uploads/'.$slider->file_path.'/'.$slider->file_name ) }}" class="img-fluid">
							</div>	
						</div>
					</div>
					



    				<label for="name" class="mtop16" >Contenido: </label>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">
							<i class="fa-regular fa-keyboard"></i>
						</span>
						{!! Form::textarea('content', html_entity_decode($slider->content), ['class' => 'form-control', 'rows' => '3']) !!}
					</div>

					<label for="name">Orden de Slider: </label>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">
							<i class="fa-regular fa-keyboard"></i>
						</span>
						{!! Form::number('sorder', $slider->sorder, ['class' => 'form-control', 'min' => '0']) !!}
					</div>

					{!! Form::submit('Guardar', ['class' => 'btn btn-success mtop16']) !!}
                	{!! Form::close() !!}
                </div>
            </div>
            @endif
        </div>

    </div>
</div>

@endsection