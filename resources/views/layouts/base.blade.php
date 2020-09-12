<!-- resources/views/layouts/base.blade.php -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    @include('layouts.header')
</head>
<body style="text-color: white">
    @yield('body')
    <footer class="footer">
        <div class="container">
            <span class="text-muted">Copyright &copy; myMovies</span>
        </div>
    </footer>
</body>
</html>
