<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;
use App\Models\Categoria;

class ProdutoController extends Controller
{

    public function index(){

        $produtos = Produtos::all();

        return view('home', ['produtos' => $produtos]);

    }

    public function create()
    {
        $categoria = Categoria::all();

        return view('produtos.create',['categorias' => $categoria]);
    }

    public function store(Request $request)
    {

        $produtos = new Produtos;

        $produtos->nome = $request->nome;
        $produtos->tipo = $request->tipo;
        $produtos->marca = $request->marca;
        $produtos->modelo = $request->modelo;
        $produtos->descricao = $request->descricao;
        $produtos->categoria_id = $request->categoria;
        $produtos->preco = $request->preco;

        $produtos->quantidade = 0;

        //dd($produtos->imagem);

        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){

            $requestImage = $request->file('imagem');

            $extension = $requestImage->extension();

            $imageName=md5($requestImage->getClientOriginalName().strtotime("now")).".".$extension;

            $destinationPath = public_path('imagem/produtos');

            $requestImage->move($destinationPath,$imageName);

            $produtos->imagem = $imageName;

        }

        $produtos->save();


        return redirect()->route('produtos.index')
            ->with('success', 'Produto criado com sucesso.');
    }

    public function show()
    {

        $produtos = Produtos::all();

        return view('produtos.show', ['produtos' => $produtos]);
    }

    public function edit($id)
    {
        $produtos = Produtos::where('id', $id)->firstOrFail();

        return view('produtos.edit', ['produtos' => $produtos]);
    }

    public function update($id,Request $request)
    {
        $data['nome'] = $request->nome;
        $data['marca'] = $request->marca;
        $data['modelo'] = $request->modelo;
        $data['tipo'] = $request->tipo;
        $data['descricao'] = $request->descricao;
        $data['preco'] = $request->preco;
        $data['quantidade'] = $request->quantidade;

        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){

            $requestImage = $request->file('imagem');

            $extension = $requestImage->extension();

            $imageName=md5($requestImage->getClientOriginalName().strtotime("now")).".".$extension;

            $destinationPath = public_path('imagem/produtos');

            $requestImage->move($destinationPath,$imageName);

            $data['imagem'] = $imageName;

        }

        Produtos::where('id', $id)->firstOrFail()->update($data);

        return redirect()->route('produtos.show')
            ->with('success', 'Produto atualizado com sucesso.');
    }

    public function destroy(Produtos $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')
            ->with('success', 'Produto deletado com sucesso.');
    }

    public function info($id){

        $produto = Produtos::where('id', $id)->firstOrFail();

        return view('produtos.info', ['produto' => $produto]);

    }

    public function lista(){

        $produtos = Produtos::latest()->paginate(30);

        return view('produtos.lista', ['produtos' => $produtos]);

    }

}
