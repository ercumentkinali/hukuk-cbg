<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('master.parts.head')
</head>

<body class="relative w-full h-screen bg-backgorund">
    @yield('content')
    @include('master.parts.footer')
    @include('master.parts.foot')
</body>

</html>
