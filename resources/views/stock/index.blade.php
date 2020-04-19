@extends('default')
@section('content')

<div class="pt-4">
  <div class="card">
    <h1 class="card-body">Estoque de Quadrinhos</h1>
  </div>

  @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
  @endif

  <a href="{{ route('stock.insert') }}"><button type="button" class="btn btn-info mt-4">Adicionar Quadrinhos</button></a>

  <table class="table mt-4">
    <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">SKU</th>
            <th scope="col">Nome</th>
            <th style="width: 3% ;" colspan="2" scope="col">Ações</th>
      </tr>
    </thead>

    @foreach ($comics as $comic)
    <tbody>
        <tr>
          <th scope="row">{{ $comic->getId()}}</th>
          <td>{{ $comic->getSku()}}</td>
          <td>{{ $comic->getName()}}</td>          
          <td>
              <form action="{{ route('stock.remove', $comic->getId())}}" method="POST">
                <input class="btn btn-outline-primary" type="submit" value="Baixa" />
                @csrf
                @method('put')
              </form>
          </td>
        </tr>
    </tbody>    
    @endforeach

  </table>

</div>

@endsection