<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav>
        <ul>
            <li><a class="nav-link" href="view.html">Home</a></li>
            <!-- <li><a class="nav-link" href="source.html">Sources</a></li> -->
        </ul>
    </nav>

    @yield('content')

    <footer>
        <p>&copy; <b>Usman Hidayatulloh Sidiq</b> - 220403010002</p>
    </footer>
</body>
</html>