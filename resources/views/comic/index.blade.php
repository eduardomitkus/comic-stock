@extends('default')
@section('content')

<div class="pt-4">
    <div class="card">
        <h1 class="card-body">Listagem de Quadrinhos</h1>
    </div>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table mt-4">
        <thead class="thead-light">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">SKU</th>
                <th scope="col">Nome</th>
                <th scope="col">Ações</th>
          </tr>
        </thead>

        @foreach ($comics as $comic)
        <tbody>
            <tr>
              <th scope="row">{{ $comic->getId()}}</th>
              <td>{{ $comic->getSku()}}</td>
              <td>{{ $comic->getName()}}</td>
              <td><a href="{{ route('comics.edit', $comic->getId())}}"><button type="button" class="btn btn-info">Editar</button></a></td>
            </tr>
        </tbody>    
        @endforeach

    </table>
</div>

@endsection