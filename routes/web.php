<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EnderecoController;

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

Route::match(['get', 'post'], '/', [ ProdutoController::class, 'index'])->name("home");

Route::match(['get', 'post'], '/categoria/{idcategoria}', [ ProdutoController::class, 'categoria'])->name("categoria_por_id");

Route::match(['get', 'post'], '/categoria', [ ProdutoController::class, 'categoria'])->name("categoria");

Route::match(['get', 'post'], '/cadastro', [ ClienteController::class, 'cadastro'])->name("cadastro");

Route::match(['get', 'post'], '/logar', [ UsuarioController::class, 'logar'])->name("login");

Route::get('/sair', [ UsuarioController::class, 'sair'])->name("logout");

Route::match(['get', 'post'], '/cliente/cadastro', [ ClienteController::class, 'cadastrarCliente'])->name("cadastrar_cliente");

Route::match(['get', 'post'], '/{idproduto}/carrinho/adicionar', [ ProdutoController::class, 'adicionarCarrinho'])->name("adicionar_carrinho");

Route::match(['get', 'post'], '/carrinho', [ ProdutoController::class, 'verCarrinho'])->name("ver_carrinho");

Route::match(['get', 'post'], '/{indice}/excluircarrinho', [ ProdutoController::class, 'excluirCarrinho'])->name("carrinho_excluir");

Route::post('/carrinho/finalizar', [ ProdutoController::class, 'finalizar'])->name("carrinho_finalizar");

Route::match(['get', 'post'], '/compras/historico', [ ProdutoController::class, 'historico'])->name("compras_historico");

Route::match(['get', 'post'], '/compras/detalhes', [ ProdutoController::class, 'detalhes'])->name('compra_detalhes');

Route::match(['get', 'post'], '/perfil', [ UsuarioController::class, 'verPerfil'])->name('ver_perfil');

Route::match(['get', 'post'], '/informacoes/{usuario_id}', [ UsuarioController::class, 'alterarPerfil'])->name('alterar_perfil');

Route::match(['get', 'post'], '/endereco/{usuario_id}', [ UsuarioController::class, 'alterarEndereco'])->name('alterar_endereco');

Route::match(['get', 'post'], '/perfil/alterado', [ UsuarioController::class, 'mudarInformacoes'])->name('mudar_informacoes');

Route::match(['get', 'post'], '/enderecos/alterado', [ EnderecoController::class, 'mudarEndereco'])->name('mudar_endereco');

Route::match(['get', 'post'], '/perfildeletado/{usuario_id}', [ UsuarioController::class, 'deletarUsuario'])->name('deletar_perfil');