@extends('default')
@section('content')

<div class="pt-4">
  <div class="card">
    <h1 class="card-body">Adicionar ao estoque</h1>
  </div>

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
              <form action="{{ route('stock.save', $comic->getId())}}" method="POST">
                <input class="btn btn-outline-info" type="submit" value="Adicionar" />
                @csrf
                @method('put')
              </form>
          </td>
        </tr>
    </tbody>    
    @endforeach

  </table>
</div>
</div>

  @endsection