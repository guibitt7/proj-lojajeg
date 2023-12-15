<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produtos;

class CategoriaController extends Controller
{

    public function index($id){

        $categoria = Categoria::where('nome',$id)->firstOrFail();

        $produtos = Produtos::where('categoria_id',$categoria->id)->latest()->paginate(30);

        return view('produtos.lista', ['produtos' => $produtos]);

    }
}