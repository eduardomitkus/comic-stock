@extends('default')
@section('content')

<div class="pt-4">
    <div class="card">
        <h1 class="card-body">Relatório de Movimentações</h1>
    </div>

    <div class="mt-4 card">
        <div class="card-header">
          Adicionados
        </div>
        
        <div class="card-body">
          <h5 class="card-title">Comics em estoque</h5>
          <p class="card-text">Quantos e quais produtos foram adicionados ao estoque.</p>

          <form action="{{ route('movements.stock')}}" method="POST">
            <input class="btn btn-primary" type="submit" value="Ver" />
            <input type="hidden" name="date" value="{{$date}}">
            @csrf
          </form>
        </div>
    </div>

    <div class="mt-4 card">
      <div class="card-header">
        Removidos
      </div>
      
      <div class="card-body">
        <h5 class="card-title">Comics removidos do estoque</h5>
        <p class="card-text">Quantos e quais produtos foram removidos ao estoque.</p>

        <form action="{{ route('movements.removed')}}" method="POST">
          <input class="btn btn-primary" type="submit" value="Ver" />
          <input type="hidden" name="date" value="{{$date}}">
          @csrf
        </form>
      </div>
  </div>
</div>

@endsection