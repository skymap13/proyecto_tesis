<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title') - {{Config::get('mycms.name')}}</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="routeName" content="{{ Route::currentRouteName() }}">
	<meta name="currency" content="{{ Config::get('mycms.currency') }}">
	<meta name="auth" content="{{Auth::check()}}">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

	<link rel="stylesheet" href="{{ url('/static/css/style.css?v='.time()) }}">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400/700&disp1ay=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/57723ea876.js" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


	<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
	
	

	<script src="{{ url('/static/libs/ckeditor/ckeditor.js') }}"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script src="{{ url('/static/js/mdslider.js?v='.time()) }}"></script>
	<script src="{{ url('/static/js/site.js?v='.time()) }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	


</head>
<body>

	<nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('/static/imagenes/logodasboardemail.png') }}"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link"><i class="fa-solid fa-house-chimney"></i> <span></span> Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link"><i class="fa-solid fa-shop"></i> <span></span> Tienda</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link"><i class="fa-solid fa-people-group"></i> <span></span> Sobre nosotros</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link"><i class="fa-solid fa-phone-volume"></i> <span></span> Contacto</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/car') }}" class="nav-link"><i class="fa-solid fa-cart-shopping"></i><span class="carnumber"> 0 </span></a>
                </li>

                
                @if(Auth::guest())
                <li class="nav-item link-acc">
                    <a href="{{ url('/login') }}" class="nav-link btn"><i class="fa-solid fa-fingerprint"></i> Mi Cuenta</a>
                    <a href="{{ url('/register') }}" class="nav-link btn"><i class="fa-solid fa-circle-user"></i> Crear cuenta</a>
                </li>
                @else
                <li class="nav-item link-acc dropdown link-user ">
                    <a href="{{ url('/login') }}" class="nav-link btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    	@if(is_null(Auth::user()->avatar)) 
                    	<img src="{{ url('/static/imagenes/default-avatar.png')}}">
                    	@else
                    	<img src="{{ url('/uploads_users/'.Auth::id().'/av_'.Auth::user()->avatar) }}">
                    	@endif  Hola: {{ Auth::user()->name }} {{ Auth::user()->lastname }} 
                    </a>
                        
                        <ul class="dropdown-menu shadow">
                        	@if(Auth::user()->role == "1")
	                        	<li>
	                        		<a class="dropdown-item" href="{{ url('/admin') }}">
	                        			<i class="fa-solid fa-chalkboard-user"></i> Administrador
	                        		</a>
	                        	</li>
	                        	<li> <hr class="dropdown-divider"></li>
                        	@endif
                        	
                        	<li>
                        		<a class="dropdown-item" href="{{ url('/account/favorites') }}">
                        			<i class="fa-solid fa-heart"></i> Favoritos
                        		</a>
                        	</li>

                        	<li>
                        		<a class="dropdown-item" href="{{ url('/account/edit') }}">
                        			<i class="fa-solid fa-address-card"></i> Editar Informacion
                        		</a>
                        	</li>
                        	
                        	<li>
                        		<a class="dropdown-item" href="{{ url('/logout') }}">
                        			<i class="fa-solid fa-right-from-bracket"></i> Salir
                        		</a>
                        	</li>
                        	
                        </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>






	@if(Session::has('message') )
		<div class="container">
		<div class="alert alert-{{ Session::get('typealert') }} " style="display:none;">
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

	<div class="wrapper">
		<div class="container">
			@yield('content')
		</div>
	</div>

	

	<script>
        document.addEventListener('DOMContentLoaded', function () {
            // Inicializa FancyBox con opciones personalizadas
            Fancybox.bind('[data-fancybox="gallery"]', {
                // Tus opciones personalizadas aquí
            });
        });
    </script>
</body>
</html>