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

Route::get('/', 'AcessoController@index')->name('site.index');
Route::post('/', 'AcessoController@autenticar')->name('site.index');
Route::get('/cadastro', 'AcessoController@cadastro')->name('site.cadastro');
Route::post('/cadastro', 'AcessoController@cadastrar')->name('site.cadastro');
Route::get('/recuperarSenha', 'AcessoController@recuperarSenha')->name('site.recuperarsenha');

Route::middleware('autenticacao')->prefix('/app')->group( function (){
    Route::get('/inicio', 'ChamadoController@inicio')->name('app.inicio');  
    Route::get('/sair', 'AcessoController@sair')->name('app.sair'); 
    Route::resource('chamado', 'ChamadoController');
    Route::resource('usuario', 'UsuarioController');
    Route::resource('relatorio', 'RelatorioController');
});


Route::fallback( function () {
    echo 'A página acessada não existe. <a href="/">Clique aqui</a> para retornar a página inicial.';
});