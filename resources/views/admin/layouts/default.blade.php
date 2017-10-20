<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('admin.includes.head')
</head>
<body>
@include('admin.includes.navigation')
@yield('content')
<script src="{{ asset("assets/scripts/frontend.js") }}" type="text/javascript"></script>
</body>
</html>