<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @stack('title')

    @include('includes.head')
</head>

<body>
    <div id="wrapper">
        @include('includes.header')
        @include('includes.nav')
        <div id="page-wrapper">
            <div>@yield('message')</div>
            <div id="page-inner">
                @yield('content')
            </div>
        </div>
    </div>
    @include('includes.footer')
</body>

</html>

</html>
