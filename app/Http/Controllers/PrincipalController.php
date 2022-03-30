<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MotivoContato;

class PrincipalController extends Controller
{
    public function index () {

        $motivoContato = MotivoContato::all();

        return view ('site.principal', ['motivoContato' => $motivoContato]);
    }
}
