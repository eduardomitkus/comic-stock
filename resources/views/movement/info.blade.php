@extends('default')
@section('content')

<div class="pt-4">
    <div class="card">
        <h1 class="card-body">Comics estocados no dia {{ Carbon\Carbon::parse($date)->format('d/m/Y') }}</h1>
    </div>    

    <ul class="mt-4 list-group">
        <li class="list-group-item bg-light">Nome das Comics</li>

        @if ($movements->isEmpty())
        <div class="mt-4 alert alert-danger" role="alert">
            Não há comics relacionadas à esse dia
        </div>
        @else
        <div class="mt-4 alert alert-info" role="alert">
            Quantidade de Comics em estoque: {{ $movements->count() }}
        </div>
        @endif
        
        @foreach ($movements as $comic)
        <li class="list-group-item">{{ $comic->getNameComic() }}</li>
        @endforeach
      </ul>
</div>

@endsection