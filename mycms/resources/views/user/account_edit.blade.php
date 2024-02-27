@extends('master')

@section('title', 'Editar mi perfil')

@section('content')

<div class="row mtop32">
    <div class="col-md-4">
        <div class="panel shadow">
            <div class="header">
                <h2 class="title"> <i class="fa-solid fa-user-pen"></i> Editar avatar</h2>
            </div>
            <div class="inside"> Lorem ipsum dolor sit, amet consectetur, adipisicing elit. Corrupti aspernatur sunt vero dolore error quos hic quo placeat iure maiores aut officia dolores aliquid, nesciunt esse. Tempore saepe, repellendus voluptatem!</div>
        </div>

        <div class="panel shadow mtop32">
            <div class="header">
                <h2 class="title"> <i class="fa-solid fa-pen-to-square"></i> Cambiar Contraseña</h2>
            </div>
            <div class="inside"> Lorem ipsum dolor sit, amet consectetur, adipisicing elit. Corrupti aspernatur sunt vero dolore error quos hic quo placeat iure maiores aut officia dolores aliquid, nesciunt esse. Tempore saepe, repellendus voluptatem!</div>
        </div>  
    </div>

    <div class="col-md-8">

        <div class="panel shadow">
            <div class="header">
                <h2 class="title"> <i class="fa-solid fa-address-card"></i> Editar Informacion</h2>
            </div>
            <div class="inside"> 

                {!! Form::open(['url' => '/account/edit/info']) !!}

                    <div class="row">
                        <div class="col-md-4">
                            <label for="name">Nombre : </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-regular fa-keyboard"></i>
                                </span>
                                {!! Form::text('name', Auth::user()->name, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="lastname">Apellido : </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-regular fa-keyboard"></i>
                                </span>
                                {!! Form::text('lastname', Auth::user()->lastname, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="email">Correo Electronico : </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-regular fa-keyboard"></i>
                                </span>
                                {!! Form::text('email', Auth::user()->email, ['class' => 'form-control', 'disabled']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row mtop16">

                    	<div class="col-md-4">
                            <label for="phone"> Telefono : </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-regular fa-keyboard"></i>
                                </span>
                                {!! Form::text('phone', Auth::user()->phone, ['class' => 'form-control']) !!}
                            </div>
                        </div>


                        <div class="col-md-8">
                            <label for="module" > Fecha de nacimineto: Año - Mes - Dia </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-regular fa-keyboard"></i>
                                </span>
                                {!! Form::number('year', null,['class' => 'form-control', 'min' => getUserYears()[1], 'max' => getUserYears()[0]]) !!}
                                {!! Form::select('month', getRoleUserArray('list', null), null, ['class' => 'form-select'])!!}

                                {!! Form::number('day', null,['class' => 'form-control', 'min' => 1, 'max' => 31]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row mtop16">
                    	<div class="col-md-12">
                    		{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                    	</div>
                    </div>
                {!! Form::close() !!}
            </div>

        </div> 
    </div>
</div>
@endsection
