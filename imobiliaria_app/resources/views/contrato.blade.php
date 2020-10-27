@extends('app')

@section('content')


    <h1 class="mb-5">
        Modelo de contrato parcial de resgistro de imovél
    </h1>

    @if(session('erro'))
        <div class="alert alert-danger" role="alert">
            {{session('erro')}}
        </div>
    @endif

    <form action="{{route('voltarlista')}}" >
        <div class="form-group">
            <label>Registro de imovél</label><br>
            <a>IMOVÉL : Uma casa residencial e seu respectivo terreno, situados no estado de {{$estado}}, a cidade</a>
            <a>{{$cidade}}, bairro {{$bairro}}, à {{$logradouro}}, {{$numero}}. Proprietário: {{$proprietario}}, CPF, {{$documento}}, </a>
            <a>residente no estado de {{$estado}}, a cidade de {{$cidade}}, bairro {{$bairro}}, à {{$logradouro}}, {{$numero}},</a>
            <a>E-mail: {{$e_mail}}.</a>
        </div>

        <button type="submit" class="btn btn-primary">Voltar</button>
    </form>

@endsection