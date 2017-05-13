<html>
<!DOCTYPE html>
<head>
    <title>Last Alliance</title>
    @include('includes/mainTags')
    @include('includes/cssTags')
    @include('includes/jsTags')
    @yield('specificTags')
</head>
<header>
    @include('includes/navbar')
</header>
<body>


<div class="container-fluid">
    <div class="col-md-9 col-lg-9">
        @include('flash::message')
        @yield('content')</div>
    <aside class="sidebar col-md-3 col-lg-3 pull-right"> @include('includes/sidebar') </aside>
</div>

    @include('includes/footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>