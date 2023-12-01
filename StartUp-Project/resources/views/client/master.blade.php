<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('client.widgets.head')
</head>

<body>
    <!-- Page Preloder -->
    @include('client.widgets.preloder')
    <!-- End Page Preloder -->

    <!-- Offcanvas Menu Begin -->
    @include('client.widgets.menucanvas')
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    @include('client.widgets.navbar')
    <!-- Header Section End -->

    <!-- Content Begin -->
    @yield('main')
    <!-- Content End -->

    <!-- Footer Section Begin -->
    @include('client.widgets.footer')
    <!-- Footer Section End -->

    <!-- Search Begin -->
    @include('client.widgets.search')
    <!-- Search End -->

    <!-- Js Plugins -->
    @include('client.widgets.script')
</body>
</html>
