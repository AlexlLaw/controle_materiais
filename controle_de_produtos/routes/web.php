<?php

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

Route::get('', function () {
    return view('welcome');
});
/**Alunos**/
Route::get('/series', 'AlunoController@index')
    ->name('listar_series');
Route::get('/series/criar', 'AlunoController@create')
    ->name('form_criar_serie');
Route::get('/series/{id}', 'AlunoController@edit')
    ->name('form_editar_aluno');
Route::post('/series/criar', 'AlunoController@store');
Route::delete('/series/remover/{id}', 'AlunoController@destroy');
Route::put('/series/{id}', 'AlunoController@update');

/**Produtos**/
Route::get('/produto', 'ProdutoController@index')
    ->name('listar_produtos');
Route::get('/produto/criar', 'ProdutoController@create')
    ->name('form_criar_produtos');
Route::get('/produto/{id}', 'ProdutoController@edit')
    ->name('form_editar_produto');
Route::post('/produto/criar', 'ProdutoController@store');
Route::delete('/produto/remover/{id}', 'ProdutoController@destroy');
Route::put('/produto/{id}', 'ProdutoController@update');

/**Turmas**/
Route::get('/turmas', 'TurmasController@index')
    ->name('listar_turmas');
Route::get('/turmas/criar', 'TurmasController@create')
    ->name('form_criar_turmas');
Route::post('/turmas/criar', 'TurmasController@store');
Route::delete('/turma/remover/{id}', 'TurmasController@destroy');

/**loja**/
Route::get('/loja/relatorio', 'LojaController@index')
    ->name('listar_relatorio');
Route::get('/loja/vender', 'LojaController@create')
    ->name('form_criar_loja');
Route::post('/loja/vender', 'LojaController@store');

/**Import**/
Route::get('/csv/import', 'CsvController@create')
    ->name('form_import_csv');
Route::post('/csv/import', 'CsvController@csv_import')->name('import');

