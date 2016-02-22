<!DOCTYPE html>
<!--[if IE 8]>               <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <title>{{ isset($pageTitle) ? $pageTitle . ' - ' : '' }}BADHAN - A Voluntary blood donors' organization</title>

    @section('styles')
        <link rel="stylesheet" href="{{ asset('stylesheets/app.css') }}">
    @show

</head>
<body>


<div class="wrapper">
    <div class="top-header">
        @include('layouts._top_nav')
    </div>

    <div class="holder">
        @include('layouts._flash')

        <div class="content">
            @yield('content')
        </div>
    </div>
</div>

<div class="push"></div>

@include('layouts._footer')

@section('scripts')
    <script src="{{ asset('javascripts/vendor/jquery.min.js') }}"></script>
@show


</body>
</html>
