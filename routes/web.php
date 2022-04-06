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
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
use App\Http\Controllers\TesteController;




Route::get('/', [PrincipalController::class, 'index'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobre-nos');

//LOGIN
Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenthicate'])->name('site.login');

//CONTATO
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'store'])->name('site.contato');

//APP
Route::prefix('/app')->middleware('autenticacao:padrao,supervisor')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'logOut'])->name('app.sair');
    
    //FORNECEDOR
    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/fornecedor/listar', [FornecedorController::class, 'list'])->name('app.fornecedor.listar');
    Route::post('/fornecedor/listar', [FornecedorController::class, 'list'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', [FornecedorController::class, 'add'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [FornecedorController::class, 'add'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', [FornecedorController::class, 'edit'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', [FornecedorController::class, 'delete'])->name('app.fornecedor.excluir');

    //PRODUTO
    Route::resource('produto', ProdutoController::class);

    //PRODUTOS DETALHES
    Route::resource('produto-detalhe', ProdutoDetalheController::class);

    //PEDIDO
    Route::resource('pedido', PedidoController::class);

    //CLIENTES
    Route::resource('cliente', ClienteController::class);

    //PEDIDOS-PRODUTOS
    Route::get('pedido-produto/create/{pedido}', [PedidoProdutoController::class, 'create'])->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', [PedidoProdutoController::class, 'store'])->name('pedido-produto.store');
    Route::delete('pedido-produto/destroy/{pedidoProduto}/{pedidoId}', [PedidoProdutoController::class, 'destroy'])->name('pedido-produto.destroy');
    // Route::delete('pedido-produto/destroy/{pedido}/{produto}', [PedidoProdutoController::class, 'destroy'])->name('pedido-produto.destroy');
    //Route::resource('pedido-produto', PedidoProdutoController::class);
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