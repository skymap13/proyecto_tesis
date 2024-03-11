<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title') - {{Config::get('mycms.name')}}</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="routeName" content="{{ Route::currentRouteName() }}">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>  
	<link rel="stylesheet" href="{{ url('/static/css/admin.css?v='.time()) }}">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400/700&disp1ay=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/57723ea876.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
 
	

	<script src="{{ url('/static/libs/ckeditor/ckeditor.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>	
	<script src="{{ url('/static/js/admin.js?v='.time()) }}"></script>

	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltips"]').tooltip()
		});
	</script>

</head>
<body>
	<div class="wrapper">
		<div class="col1">@include('admin.sidebar')</div>
		<div class="col2">
			<nav class="navbar navbar-expand-lg shadow">
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="{{ url('/admin') }}" class=" nav-link ">
								<i class=" fa-solid fa-house "></i> Dashboard
							</a>
						</li>
					</ul>
				</div>
			</nav>

			<div class="page">
				<div class="container-fluid">
					<nav aria-label="breadcrumb shadow">
						<ol class=" breadcrumb ">
							<li class="breadcrumb-item">
								<a href="{{ url('/admin') }}"><i class=" fa-solid fa-house "></i> Dashboard</a>
							</li>
							@section('breadcrumb')
							@show
						</ol>
					</nav>
				</div>
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

				@section('content')







				@show

			</div>
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