@extends('layouts.main')
@section('title', 'Meu Carrinho')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Meu Carrinho</h2>
            @if (session('msg'))
            <div class="alert alert-success" role="alert">
                {{ session('msg') }}
            </div>
            @endif
      @if($carrinho->isEmpty())
            <div class="alert alert-warning" role="alert">
                Seu carrinho está vazio. <a href="{{ route('produtos.index') }}">Ir para a lista de produtos</a>
            </div>
            @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço Unitário</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carrinho as $item)
                    <tr>
                        <td>
                            <h5>{{ $item->produto->nome }}</h5>   
                        </td>
                        <td>
                            <form action="{{ route('carrinho.update', ['id' => $item->id]) }}" method="post">
                                @csrf
                                <input type="number" name="quantity" class="form-control" value="{{ $item->quantidade }}" min="1" max="99" />
                                <button type="submit" class="btn btn-sm btn-outline-secondary mt-1">Atualizar</button>
                            </form>
                        </td>
                        <td>R$ {{ $item->produto->preco }}</td>
                        <td>R$ {{ $item->produto->preco * $item->quantidade }}</td>
                        <td>
                            <a href="{{ route('carrinho.remove', ['carrinho_id' => $item->id]) }}" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3">Total:</td>
                        <td colspan="2">
                            <strong>R$ {{ $carrinho->reduce(function ($acc, $item) { return $acc + $item->produto->preco * $item->quantidade; }, 0) }}</strong>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-between">
                <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Continuar comprando</a>
                <a href="{{ route('checkout.index') }}" class="btn btn-primary">Finalizar compra</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection