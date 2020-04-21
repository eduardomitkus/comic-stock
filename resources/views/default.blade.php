<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comic Stock</title>
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('comics.index')}}">Comic Stock</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="{{ route('comics.index')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('comics.create')}}">Cadastrar Comic</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('stock.index') }}">Estoque</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('movements.index')}}">Relatório</a>
                </li>
              </ul>
            </div>
          </nav>
        @yield('content')
    </div>    
</body>
</html>