<!DOCTYPE html>
<html>
<head>
    <title>My App</title>
</head>
<body>
    @include('partials.head')
    @include('partials.header')
        @yield('content') 
    @include('partials.footer')
</body>
</html>
