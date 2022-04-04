<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(10);

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:500',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id' //exists:<table>,<column>
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo :attribute deve ter no máximo 40 caracteres',
            'descricao.max' => 'O campo :attribute deve ter no máximo 500 caracteres',
            'integer' => 'O campo :attribute deve ser do tipo inteiro',
            'unidade_id.exists' => 'A unidade de medida informada nao existe'
        ];

        $request->validate($rules, $feedback);
        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view ('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        return view ('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades]);
        // return view ('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $produto->update($request->all());
        return view ('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
