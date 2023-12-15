@extends('layouts.main')
@section('title', 'Checkout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Checkout</h2>
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nome completo</label>
                    <input type="text" name="name" class="form-control" id="name" required />
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" required />
                </div>
                <div class="form-group">
                    <label for="address">Endereço de entrega</label>
                    <input type="text" name="address" class="form-control" id="address" required />
                </div>
                <div class="form-group">
                    <label for="card-name">Nome no cartão</label>
                    <input type="text" name="card-name" class="form-control" id="card-name" required />
                </div>
                <div class="form-group">
                    <label for="card-number">Número do cartão</label>
                    <input type="text" name="card-number" class="form-control" id="card-number" required />
                </div>
                <div class="form-group">
                    <label for="card-expiry">Data de expiração</label>
                    <input type="text" name="card-expiry" class="form-control" id="card-expiry" required />
                </div>
                <div class="form-group">
                    <label for="card-cvc">CVC</label>
                    <input type="text" name="card-cvc" class="form-control" id="card-cvc" required />
                </div>
                <button type="submit" class="btn btn-primary">Finalizar compra</button>
            </form>
        </div>
    </div>
</div>
@endsection