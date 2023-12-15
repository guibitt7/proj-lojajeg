<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CategoriaController;


Route::get('/',[ProdutoController::class, 'index']);

Route::get('/contato', function () {
    return view('contato');
});

//Categoria

Route::get('/categoria/{id}', [CategoriaController::class, 'index']);

//Produtos

Route::get('/produtos/create', [ProdutoController::class, 'create']);
Route::get('/produtos/show', [ProdutoController::class, 'show'])->name('produtos.show');
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
Route::get('/produtos/edit/{id}', [ProdutoController::class, 'edit'])->name('produtos.edit');
Route::put('/produtos/update/{id}', [ProdutoController::class, 'update'])->name('produtos.update');
Route::delete('/produtos/delete/{id}', [ProdutoController::class, 'edit'])->name('produtos.destroy');

Route::get('/produtos/{id}', [ProdutoController::class, 'info']);
Route::get('/produtos', [ProdutoController::class, 'lista'])->name('produtos.index');

//Carrinho

Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
Route::post('/carrinho/adicionar', [CarrinhoController::class, 'add'])->name('carrinho.add');
Route::get('/carrinho/adicionar', [CarrinhoController::class, 'add'])->name('carrinho.add');
Route::get('/carrinho/remove', [CarrinhoController::class, 'remove'])->name('carrinho.remove');
Route::post('/carrinho/atualizar', [CarrinhoController::class, 'update'])->name('carrinho.update');
Route::get('/carrinho/limpar', [CarrinhoController::class, 'clear'])->name('carrinho.limpar');

//

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');


//

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
