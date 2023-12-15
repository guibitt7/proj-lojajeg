@extends('layouts.main')
@section('title', 'Compra realizada com sucesso')
@section('content')
<link rel="stylesheet" href="{{ asset('css/checkout-success.css') }}" />
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="checkout-title">Compra realizada com sucesso!</h2>
            <p class="checkout-text">Obrigado pela sua compra, {{ auth()->user()->name }}!</p>
            <p class="checkout-text">O número do seu pedido é: {{ $order}}.</p>
        </div>
    </div>
</div>
@endsection