@extends('app')

@section('content')

    <h1 class="mb-5">
        Imoveis Cadastrados
    </h1>

    <a class="btn btn-success" href="{{route('adicionar')}}">
        Adicionar Imovel
    </a>

    @if(session('sucesso'))
        <div class="alert alert-success" role="alert">
            {{session('sucesso')}}
        </div>
    @endif
    @if(session('erro'))
        <div class="alert alert-danger" role="alert">
            {{session('erro')}}
        </div>
    @endif

    <table class="table mt-5">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">E-mail</th>
            <th scope="col">CEP</th>
            <th scope="col">Logradouro</th>
            <th scope="col">Numero</th>
            <th scope="col">Bairro</th>
            <th scope="col">Cidade</th>
            <th scope="col">Estado</th>
            <th scope="col">Data da Criação</th>
            <th scope="col">Contratado</th>
            <th scope="col">Botões</th>

        </tr>
        </thead>
        <tbody>
        @foreach($imoveis as $registro)
            <tr>
                <td>{{$registro->id}}</td>
                <td>{{$registro->e_mail}}</td>
                <td>{{$registro->cep}}</td>
                <td>{{$registro->logradouro}}</td>
                <td>{{$registro->numero}}</td>
                <td>{{$registro->bairro}}</td>
                <td>{{$registro->cidade}}</td>
                <td>{{$registro->estado}}</td>
                <td>{{(new DateTime($registro->created_at))->format('d/m/Y H:i:s')}}</td>
                <td>{{$registro->status}}</td>
                <td><a href="{{route('update',$registro->id)}}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Editar</a></td>
                <td><a href="{{route('delete',$registro->id)}}" class="btn btn btn-danger btn-sm active" role="button" aria-pressed="true">Excluir</a></td>
                <td><a href="{{route('vercontrato',$registro->id)}}" class="btn btn btn-success btn-sm active" role="button" aria-pressed="true">Ver contrato</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection