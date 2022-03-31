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
use PhpParser\Node\Stmt\Echo_;


use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;

use App\Http\Controllers\TesteController;




Route::get('/', [PrincipalController::class, 'index'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobre-nos');

//LOGIN
Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenthicate'])->name('site.login');

//CONTATO
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'create'])->name('site.contato');

//APP
Route::prefix('/app')->middleware('autenticacao:padrao,supervisor')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'logOut'])->name('app.sair');
    Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente');
    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/produto', [ProdutoController::class, 'index'])->name('app.produto');
});

//REDIRECT
Route::get('/rota1', function () { 
    echo 'rota1';
})->name('site.rota1');

Route::get('/rota2', function () { 
    return redirect()->route('site.rota1');
})->name('site.rota2');
// Route::redirect('rota2', 'rota1');

//TESTE
Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('test');

//FALLBACK
Route::fallback(function() {
    echo 'A rota acessada não existe. <br> 
    <a href="'.route('site.index').'">Clique aqui</a> para retornar para a página inicial';
});




// Route::get(
//     '/contato/{nome}/{categoriaId}', 
//     function (
//         string  $nome = 'nome', int $categoriaId = 1 /* 1 = informação*/ 
//     ){
//         echo "Aqui está: $nome - $categoriaId"; 
//      }
//  )->where('nome', '[A-Za-z]+')->where('categoriaId', '[0-9]+');