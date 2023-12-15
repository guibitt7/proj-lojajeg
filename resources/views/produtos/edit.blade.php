@extends('layouts.dashboard')
@section('content')
<div class="container">
    <h1>Editar Produto</h1>
    <form method="POST" action="/produtos/update/{{$produtos->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{$produtos->nome}}" required>
        </div>
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" value="{{$produtos->marca}}" required>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" value="{{$produtos->modelo}}" required>
        </div>

        <div class="form-group">
            <label for="tipo">Tipo</label>
            <input type="text" class="form-control" id="tipo" name="tipo" value="{{$produtos->tipo}}" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3"> {{$produtos->descricao}}</textarea>
        </div>

        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" class="form-control" id="preco" name="preco" step=".01" min="0" value="{{$produtos->preco}}" required>
        </div>

        <div class="form-group">
            <label for="qunatidade">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" step=".01" min="0" value="{{$produtos->quantidade}}" required>
        </div>

        @if(isset($categorias))
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select class="form-control" id="categoria" name="categoria">
                @foreach($categorias as $categoria)
                <option name="{{$categoria->nome}}" value="{{$categoria->id}}">{{$categoria->nome}}</option>
                @endforeach
            </select>
        </div>
        @endif

        <div class="form-group">
            <label for="imagem">Imagem do produto:</label>
            <input type="file" name="imagem" id="imagem" class="form-control-file" />
        </div> 

        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
</div>
@endsection