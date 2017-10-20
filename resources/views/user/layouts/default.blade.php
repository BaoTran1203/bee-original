<!doctype html>
<html>
<head>
    @include('user.includes.head')
</head>
<body>
<div>
    @if(Session::has('message'))
        <div class="thongbao">
            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
        </div>
        {{ Session::flush() }}
    @endif

    @include('user.includes.header')
    @include('user.includes.left-menu')
    @yield('content')
    @include('user.includes.form-order')

    @if ($errors->any())
        <script>
            document.getElementById('showModel').click();
        </script>
    @endif

    @include('user.includes.bottom')
    @include('user.includes.footer')
</div>
</body>
</html>