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
<body>
    <nav class = "bg-warning d-flex flex-row mw-100 p-3">
        <img src="{{ asset('storage/logoDYID.png') }}" alt="">
        <form action="#" method = "get" class = "form-horizontal d-flex flex-row">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search">
            <button type = "submit"><i class = "fas fa-search"></i></button>
        </form>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer></footer>
</body>
</html>