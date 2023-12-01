<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Mines – Actor & Movie Infomation</title>
	<!-- Site favicon -->
	<link rel="icon" type="image/png" href="{{asset('main/img/cinema-icon.png')}}" sizes="32x32">
	<link rel="apple-touch-icon" href="{{asset('main/img/cinema-icon.png')}}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('admintemplate/vendors/styles/core.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('admintemplate/vendors/styles/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('admintemplate/src/plugins/jquery-steps/jquery.steps.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('admintemplate/vendors/styles/style.css')}}">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>

<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="{{path('app_login')}}">
					<img src="{{asset('main/img/Logo-main-dark.png')}}" alt="">
				</a>
			</div>
		</div>
	</div>
	<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
            {% block body %}{% endblock %}
		</div>
	</div>
	<!-- js -->
	<script src="{{asset('admintemplate/vendors/scripts/core.js')}}"></script>
	<script src="{{asset('admintemplate/vendors/scripts/script.min.js')}}"></script>
	<script src="{{asset('admintemplate/vendors/scripts/process.js')}}"></script>
	<script src="{{asset('admintemplate/vendors/scripts/layout-settings.js')}}"></script>
	<script src="{{asset('admintemplate/src/plugins/jquery-steps/jquery.steps.js')}}"></script>
	<script src="{{asset('admintemplate/vendors/scripts/steps-setting.js')}}"></script>
</body>

</html>