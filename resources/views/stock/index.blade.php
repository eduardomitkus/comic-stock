@extends('default')
@section('content')

<div class="pt-4">
  <div class="card">
    <h1 class="card-body">Estoque de Quadrinhos</h1>
  </div>

  <a href="{{ route('stock.insert') }}"><button type="button" class="btn btn-info mt-4">Adicionar Quadrinhos</button></a>
</div>

@endsection