<!DOCTYPE html>
<html>
<head>
	<!-- Start head -->

    @include('admin.widgets.head')
	<!-- End head -->
</head>
<body>
	<!-- Start pre-load -->
    @include('admin.widgets.pageload')

	<!-- End pre-load -->

	<!-- Start header -->
    @include('admin.widgets.navbar')
	<!-- End header -->

	<!-- Start side bar -->
    @include('admin.widgets.sidebar')
	<!-- End side bar -->

	<div class="main-container">
		<div class="pd-ltr-20">
		@yield('body')
		</div>
	</div>
	<!-- js -->
    @include('admin.widgets.script')
	<!-- end js -->
</body>
</html>
