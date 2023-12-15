<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\Storage\SessionStorage;

class CarrinhoController extends Controller
{
    public function add(Request $request)
    {
        $produto_id = $request->input('produto_id');

        $carrinho = new Carrinho;
        $carrinho->user_id = Auth::id();
        $carrinho->produto_id = $produto_id;

        if($request->quantidade != null){
            $carrinho->quantidade = $request->quantidade;
        }else{
            $carrinho->quantidade=1;
        }
        $carrinho->save();

        return redirect()->route('carrinho.index');
    }

    public function remove(Request $request)
    {
        $carrinho_id = $request->input('carrinho_id');

        $carrinho = Carrinho::find($carrinho_id);
        $carrinho->delete();

        return redirect()->route('carrinho.index');
    }

    public function index()
    {

        $carrinho = Carrinho::with('produto')->where('user_id', Auth::id())->get();

        return view('carrinho.index', ['carrinho' => $carrinho]);
    }
}
