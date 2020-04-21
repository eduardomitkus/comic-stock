@extends('default')
@section('content')
<div class="pt-4">
  <div class="card">
    <h1 class="card-body">Cadastro de Comics</h1>
  </div>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <form class="pt-4" action="{{ route('comics.store') }}" method="POST">
    @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">SKU</label>
        <input type="text" class="form-control" placeholder="Digite o SKU" name="sku" value="{{ old('sku') }}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Nome</label>
        <input type="text" class="form-control" placeholder="Digite o nome da HQ" name="name" value="{{ old('name') }}">
      </div>    
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>


@endsection