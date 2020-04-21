@extends('default')
@section('content')

<div class="pt-4">
    <div class="card">
        <h1 class="card-body">Comics removidas no dia {{ Carbon\Carbon::parse($date)->format('d/m/Y') }}</h1>
    </div>

    @if ($movements->isEmpty())
        <div class="mt-4 alert alert-danger" role="alert">
            Não há comics relacionadas à esse dia
        </div>
    @else
        <div class="mt-4 alert alert-info" role="alert">
            Quantidade de Comics removidas do estoque: {{ $movements->count() }}
        </div>
    @endif

    <ul class="mt-4 list-group">
        <li class="list-group-item bg-light">Comics</li>
        
        @foreach ($movements as $comic)
        <li class="list-group-item"><span class="float-left">{{ $comic->getNameComic() }}</span>
            <span class="float-right text-secondary badge badge-pill">Remoção realizada por: {{ $comic->getCreatedBy()}}</span>
        </li>
        @endforeach
      </ul>
</div>

@endsection