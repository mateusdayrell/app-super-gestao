<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        $fornecedores = [
            0 => ['nome' => 'Fornecedor 1',
                  'status' => 'Inat',
                  'cnpj' => '0001',
                  'ddd' => '', //Montes Claros-MG
                  'telefone' => '0000-0000'
            ],
            1 => ['nome' => 'Fornecedor 2',
                  'status' => 'Ativ',
                  'cnpj' => null,
                  'ddd' => '21', //Rio de Janeiro-RJ
                  'telefone' => '1111-1111'
            ],
            2 => ['nome' => 'Fornecedor 3',
                  'status' => 'Ativ',
                  'cnpj' => null,
                  'ddd' => '11', //São Paulo-SP
                  'telefone' => '2222-2222'
            ],
            3 => ['nome' => 'Fornecedor 4',
                  'status' => 'Ativ',
                  'cnpj' => null,
                  'ddd' => '85', //Fortaleza-CE
                  'telefone' => '3333-3333'
            ],
        ];
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
