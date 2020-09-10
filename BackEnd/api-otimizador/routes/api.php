<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('usuarios', 'UsuarioController@listar')->name('usuarios.listar');
Route::post('usuarios', 'UsuarioController@incluir')->name('usuarios.incluir');
Route::put('usuarios/{id}', 'UsuarioController@atualizar')->name('usuarios.atualizar');
Route::delete('usuarios/{id}', 'UsuarioController@excluir')->name('usuarios.excluir');
Route::get('usuarios/{id}', 'UsuarioController@listarPorId')->name('usuarios.listarPorId');

//Empresas
Route::get('empresas', 'EmpresaController@listar')->name('empresas.listar');
Route::get('empresas/{id}', 'EmpresaController@listarPorId')->name('empresas.listarPorId');

//Controles
Route::get('controles', 'ControleController@listar')->name('controles.listar');
Route::get('controles/{id}', 'ControleController@listarPorId')->name('controles.listarPorId');
Route::get('controles/{id}/editar', 'ControleController@listarControle')->name('controles.listarControle');
Route::post('controles/incluir', 'ControleController@incluir')->name('controles.incluir');
Route::put('controles/{idControle}', 'ControleController@atualizar')->name('controles.atualizar');

//Tipos usuarios
Route::get('tipos_usuarios', 'TipoUsuarioController@listar')->name('tipos_usuarios.listar');

//Observações
Route::get('observacoes/{id}', 'ObservacaoController@listarPorId')->name('observacoes.listarPorId');
Route::get('observacoes/{idControle}/{mes}', 'ObservacaoController@listarPorMesReferencia')->name('observacoes.listarPorMesReferencia');
Route::post('observacoes/{idControle}', 'ObservacaoController@incluir')->name('observacoes.incluir');

//Importador clientes
Route::group(['prefix' => 'importador/clientes'], function () {
    Route::post('{idEmpresa}', 'ImportadorClienteController@carregarArquivo')->name('importador.clientes.carregarArquivo');
});

// Importador fornecedores
Route::group(['prefix' => 'importador/fornecedores'], function () {
    Route::post('{idEmpresa}', 'ImportadorFornecedorController@carregarArquivo')->name('importador.fornecedores.carregarArquivo');
    Route::get('confrontar/{idEmpresa}', 'ImportadorFornecedorController@confrontar')->name('importador.fornecedores.confrontar');
    Route::get('download-fornecedores-com-erro/{idEmpresa}/{extensao}', 'ImportadorFornecedorController@baixarArquivoFornecedoresComErro')->name('importador.fornecedores.download');
    Route::get('download-fornecedores-ok/{idEmpresa}/{extensao}', 'ImportadorFornecedorController@baixarArquivoFornecedoresOk')->name('importador.fornecedoresok.download');
    Route::get('gerarArquivoContabilidade/{idEmpresa}', 'ImportadorFornecedorController@gerarArquivoContabilidade')->name('importador.fornecedores.gerarArquivoContabilidade');
    Route::get('download-fornecedores-contabilidade/{idEmpresa}/{extensao}', 'ImportadorFornecedorController@baixarArquivoFornecedoresContabilidade')->name('importador.fornecedoresok.download');
});
