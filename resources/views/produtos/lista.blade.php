@extends('layouts.main')
@section('title','Produtos')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($produtos as $produto)
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="/imagem/produtos/{{$produto->imagem}}" alt="Imagem do produto" />
                <div class="card-body">
                    <h5 class="card-title">{{ $produto->nome }}</h5>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="/produtos/{{ $produto->id }}" class="btn btn-sm btn-outline-secondary">Ver detalhes</a>
                            <a href="{{ route('carrinho.add', ['produto_id' => $produto->id]) }}" class="btn btn-sm btn-outline-secondary">Adicionar ao carrinho</a>
                        </div>
                        <small class="text-muted">R$ {{ $produto->preco }}</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection