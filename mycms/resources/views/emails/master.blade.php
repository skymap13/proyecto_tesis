<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body style="margin: 0px; padding: 0px; background-color: #e0e0e0;">
	<div style="
	display: block;
	max-width: 728px;
	margin: 0px auto;
	width: 60%;
	">
		<img src="{{ asset('static/imagenes/logodasboardemail.png') }}" style="width: 100%; display: block; ">
		<div style="
		background-color: #e0e0e0;
		padding: 24px;" 
		>
			@yield('content')	
		</div>
	</div>

</body>
</html>