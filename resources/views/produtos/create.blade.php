@extends('layouts.dashboard')
@section('content')
<div class="container">
    <h1>Criar Produto</h1>
    <form method="POST" action="{{ route('produtos.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" required>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" required>
        </div>

        <div class="form-group">
            <label for="tipo">Tipo</label>
            <input type="text" class="form-control" id="tipo" name="tipo" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
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
            <label for="preco">Preço</label>
            <input type="number" class="form-control" id="preco" name="preco" step=".01" min="0" required>
        </div>

        <div class="form-group">
            <label for="imagem">Imagem do produto:</label>
            <input type="file" name="imagem" id="imagem" class="form-control-file" />
        </div> 

        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
</div>
@endsection