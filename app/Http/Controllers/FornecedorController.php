<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function list(Request $request) {
        $fornecedores = Fornecedor::with(['produtos'])
            ->where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(5);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function add(Request $request) {
        $msg = '';

        //verify token
        //CREATE
        if($request->input('_token') != '' && $request->input('id') == '') {
            //validate data
            $rules = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo :attribute deve ter no mínimo 3 caracteres',
                'uf.min' => 'O campo :attribute deve ter no mínimo 2 caracteres',
                'nome.max' => 'O campo :attribute deve ter no máximo 40 caracteres',
                'uf.max' => 'O campo :attribute deve ter no máximo 2 caracteres',
                'email' => 'Email inválido'
            ];

            $request->validate($rules, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'O cadastro foi realizado com sucesso';

        } //EDIT
        else if ($request->input('_token') != '' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update) {
                $msg = 'Atualização realizada com sucesso';
            } else {
                $msg = 'Erro ao atualizar registro';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function edit ($id, $msg = '') {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function delete ($id) {
        Fornecedor::find($id)->delete(); //->forceDelete();

        return redirect()->route('app.fornecedor');
    }
}
