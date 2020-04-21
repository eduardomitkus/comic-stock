@extends('default')
@section('content')

<div class="pt-4">
    <div class="card">
        <h1 class="card-body">Movimentações</h1>
    </div>

    <ul class="pt-4 list-group">
        <li class="list-group-item bg-light">Datas</li>
        @foreach ($dates as $date)
        <li class="list-group-item"><p class="float-left">{{ Carbon\Carbon::parse($date)->format('d/m/Y') }}</p>

        <form action="{{ route('movements.report')}}" method="POST">
            <input class="float-right btn btn-primary" type="submit" value="Ver" />
            <input type="hidden" name="date" value="{{$date}}">
            @csrf
        </form>
        </li>
        @endforeach
        
    </ul>
</div>

@endsection