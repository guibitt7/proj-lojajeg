@extends('layouts.main')
@section('title','Minha pagina de Vendas')
@section('content')
<section class="carrosel">
    <div id="carouselExample" class="carousel slide" >
        <div class="carousel-inner">
            @foreach($produtos as $key => $produto)
            @if($key < 3)
            <div class="carousel-item @if($key == 0) active @endif">
                <a href="/produtos/{{$produto->id}}">
                    <img src="/imagem/produtos/{{$produto->imagem}}" class="d-block w-100" alt="..." />
                    <p>{{$produto->nome}}</p>
                </a>
            </div>
            @endif
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<section>
    <h2>Produtos em destaque</h2>
    <ul>
        @foreach($produtos as $produto)
        <li>
            <a href="/produtos/{{$produto->id}}">
                <h3>{{$produto->nome}}</h3>
                <img src="/imagem/produtos/{{$produto->imagem}}" alt="{{$produto->nome}}" />
               <p><small class="text-muted">R$ {{ $produto->preco }}</small></p>
            </a>
        </li>
        @endforeach
    </ul>
</section>
@endsection