@extends('layouts.dashboard')
@section('content')
<div class="container">
    <h1>Lista de Produtos</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Tipo</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
            <tr>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->marca }}</td>
                <td>{{ $produto->modelo }}</td>
                <td>{{ $produto->tipo }}</td>
                <td>{{ $produto->preco }}</td>
                <td>{{ $produto->quantidade }}</td>
                <td>
                    <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                                @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection