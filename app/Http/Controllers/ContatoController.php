<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato (Request $request) {

        $motivoContato = MotivoContato::all();

        return view ('site.contato', ['titulo' => 'Contato', 'motivoContato' => $motivoContato]);
    }

    public function create (Request $request) {

        $rules = [
            'nome' => 'required|min:3|max:40',
            'email' => 'email',
            'telefone' => 'required',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:1000'
        ];

        $feedback = [
            'nome.min' => 'O campo :attribute deve ter pelo menos 3 caracteres',
            'nome.max' => 'O campo :attribute de ter no máximo 40 caracteres',
            'motivo_contatos_id.required' => 'O campo motivo contato deve ser preenchido',
            'mensagem.max' => 'A :attribute de ter no máximo 200 caracteres',            
            'email' => 'Email inválido',
            'required' => 'O campo :attribute deve ser preenchido'
        ];

        $request->validate($rules, $feedback);

        SiteContato()::create($request->all());

        return redirect()->route('site.index');
    }
}
