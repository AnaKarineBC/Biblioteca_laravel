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

use App\Models\Produto;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/cadastrar', function () {
    return view('cadastrar');
});

Route::post('/cadastrar-produto', function(Request $request){

    Produto::create([
        'nome' => $request->nome,
        'valor' => $request->valor,
        'estoque' => $request->estoque
    ]);

    echo "Produto criado com sucesso!";
});

Route::get('/listar-produto/{id}', function($id){
    //dd(Produto::find($id)); //debug and die
    $produto = Produto::find($id);
    return view('listar', ['produto' => $produto]);
});

Route::get('/editar-produto/{id}', function($id){
    //dd(Produto::find($id)); //debug and die
    $produto = Produto::find($id);
    return view('editar',['produto' => $produto]);
});

Route::post('/editar-produto/{id}', function(Request $request, $id){
    //dd($request->all());
    $produto = Produto::find($id);

    $produto->update([
        'nome' => $request->nome,
        'valor' => $request->valor,
        'estoque' => $request->estoque
    ]);

    echo "Produto editado com sucesso!";

});

Route::get('/excluir-produto/{id}',function($id){
    //dd($request->all());
    $produto = Produto::find($id);
    $produto->delete();

    echo "Produto excluido com sucesso!";
});
