<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    {{-- font awesome --}}
    <link href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel = "stylesheet">
</head>
<body class = "min-vh-100 d-flex flex-column bg-secondary">
    <header class = "bg-warning d-flex flex-row mw-100 p-3">
        <img src="{{ asset('image/icon/logoDYID.png') }}" alt="" height=50px class = "px-2">
        <form action="#" method = "get" class = "form-horizontal d-flex flex-row w-75">
            <input type="search" class="form-control rounded w-100" placeholder="Search" aria-label="Search">
            <button type = "submit" class = "btn btn-primary rounded"><i class = "fas fa-search"></i></button>
        </form>
    </header>
    <nav class = "bg-primary d-flex flex-row align-items-center justify-content-between mw-100 p-3">
        <a href="/" class = "text-white text-decoration-none">Home</a>
        <div class = "d-flex flex-row justify-content-center align-items-center">
            <a href = "/login" class = "btn btn-primary border mx-1">Login</a>
            <a href = "/register" class = "btn btn-primary border mx-1">Register</a>
        </div>
    </nav>
    <main class = "d-flex justify-content-center align-items-start p-5">
        @yield('content')
    </main>
    <footer class = "mt-auto d-flex flex-column justify-content-center align-items-center bg-primary p-3">
        <div class = "d-flex flex-row justify-content-evenly w-50 my-1">
            <a href = "https://facebook.com" class = "fab text-decoration-none fa-facebook-f text-white"></a>
            <a href = "https://twitter.com" class = "fab text-decoration-none fa-twitter text-white"></a>
            <a href = "https://instagram.com" class = "fab text-decoration-none fa-instagram text-white"></a>
        </div>
        <div class = "mt-2 d-flex align-items-center justify-content-center text-white">
            &copy;2021 Copyright DY20-1
        </div>
    </footer>
</body>
</html>