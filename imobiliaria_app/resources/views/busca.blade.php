@extends('app')

@section('content')


    <h1 class="mb-5">
        Buscar Imóvel por e-mail
    </h1>

    @if(session('erro'))
        <div class="alert alert-danger" role="alert">
            {{session('erro')}}
        </div>
    @endif

    <form action="{{route('buscar')}}" method="get">
        <div class="form-group">
            <label>E-mail do proprietário</label>
            <input type="text" class="form-control" name="emailprop">
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

@endsection