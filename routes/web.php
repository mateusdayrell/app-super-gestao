<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreNosController;
use PhpParser\Node\Stmt\Echo_;

Route::get('/', [PrincipalController::class, 'principal']);

Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos']);

Route::get('/contato', [ContatoController::class, 'contato']);

Route::get(
    '/contato/{nome?}/{assunto?}/{mensagem?}', 
    function (string  $nome = 'nome', string $assunto ='assunto', string $mensagem = 'mensagem'){
    echo "Aqui está: $nome - $assunto - $mensagem";
 });