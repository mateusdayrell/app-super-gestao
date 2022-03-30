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

use App\Http\Middleware\LogAcessoMiddleware;

use App\Http\Controllers\TesteController;




Route::get('/', [PrincipalController::class, 'index'])->middleware(LogAcessoMiddleware::class)->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobre-nos');
Route::get('/login', function () { return 'login'; })->name('site.login ');

//CONTATO
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'create'])->name('site.contato');

Route::prefix('/app')->group(function(){
    Route::get('/clientes', function () { return 'clientes'; })->name('app.clientes');
    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/produtos', function () { return 'produto'; })->name('app.produtos');
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