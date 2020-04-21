@extends('default')
@section('content')

<div class="pt-4">
    <div class="card">
        <h1 class="card-body">Relatório de Movimentações</h1>
    </div>

    <div class="mt-4 card">
        <div class="card-header">
          Comics
        </div>
        <div class="card-body">
          <h5 class="card-title">Comics no estoque</h5>
          <p class="card-text">Quantos e quais produtos foram adicionados ao estoque.</p>

          <form action="{{ route('movements.info')}}" method="POST">
            <input class="btn btn-primary" type="submit" value="Ver" />
            <input type="hidden" name="date" value="{{$date}}">
            @csrf
        </form>

        </div>
    </div>
</div>

@endsection