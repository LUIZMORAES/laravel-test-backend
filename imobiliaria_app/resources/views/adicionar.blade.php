@extends('app')

@section('content')


    <h1 class="mb-5">
        Adicionar Imóvel
    </h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('salvar')}}" method="post">
        @csrf

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Imovel</a>

            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Endereço</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="form-group">
                    <label>Proprietário</label>
                    <input type="text" class="form-control" name="proprietario" value="{{$proprietario ?? ''}}">
                </div>
                <div class="form-group">
                    <label>Tipo de pessoa</label>
                    <input type="text" class="form-control" name="tipo_pessoa" value="{{$tipo_pessoa ?? ''}}">
                </div>
                <div class="form-group">
                    <label>CPF/CNPJ</label>
                    <input type="text" class="form-control" name="documento" value="{{$documento ?? ''}}">
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" class="form-control" name="e_mail" value="{{$e_mail ?? ''}}">
                </div>

            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="form-group">
                    <label>Cep</label>
                    <input type="text" class="form-control" name="cep" value="{{$cep ?? ''}}">
                </div>
                <div class="form-group">
                    <label>Logradouro</label>
                    <input type="text" class="form-control" name="logradouro" value="{{$logradouro ?? ''}}">
                </div>
                <div class="form-group">
                    <label>Numero</label>
                    <input type="text" class="form-control" name="numero" value="{{$numero ?? ''}}">
                </div>
                <div class="form-group">
                    <label>Complemento</label>
                    <input type="text" class="form-control" name="complemento" value="{{$complemento ?? ''}}">
                </div>
                <div class="form-group">
                    <label>Bairro</label>
                    <input type="text" class="form-control" name="bairro" value="{{$bairro ?? ''}}">
                </div>
                <div class="form-group">
                    <label>Cidade</label>
                    <input type="text" class="form-control" name="cidade" value="{{$cidade ?? ''}}">
                </div>
                <div class="form-group">
                    <label>Estado</label>
                    <input type="text" class="form-control" name="estado" value="{{$estado ?? ''}}">
                </div>
                <div class="form-group">
                    <label>Contratado</label>
                    <input type="text" class="form-control" name="status" value="{{$status ?? ''}}">
                </div>
            </div>
         </div>


        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

@endsection