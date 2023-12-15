@extends('layouts.main')
@section('title',$produto->nome)
@section('content')
<div class="container">
    <h1>Comprar Produto</h1>
    <img src="/imagem/produtos/{{$produto->imagem}}" />
    <p>
        <strong>Produto:</strong> {{ $produto->nome }}
    </p>
    <p>
        <strong>Descrição:</strong> {{ $produto->descricao }}
    </p>
    <p>
        <strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}
    </p>
    <p>
        <strong>Estoque:</strong> {{ $produto->quantidade }}
    </p>

    <form method="POST" action="{{ route('carrinho.add', ['produto_id' => $produto->id]) }}">
        @csrf

        <div class="form-group">
            <label for="quantidade">Quantidade:</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" min="1" max="{{ $produto->estoque }}" required />
        </div>

        <button type="submit" class="btn btn-primary">Comprar</button>
    </form>
</div>
@endsection