<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
</head>

<body>
    @include('layouts.header')
    <main>
        @yield('content')
    </main>
    @include('layouts.footer')
</body>

</html>