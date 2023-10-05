<?php

namespace App\Http\Controllers;

use App\Http\Requests\GestaoFormRequest;
use App\Models\Gestao;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class GestaoController extends Controller
{
    use HasFactory;

    public function storeGestao(GestaoFormRequest $request){

        $gestao = Gestao::create([

       
        'titulo' => $request-> titulo,
        'descricao' => $request-> descricao,
        'data_inicio' => $request -> data_inicio,
        'data_termino'=> $request -> data_termino,
        'valor_projeto' => $request ->valor_projeto,
        'status' => $request-> status
        ]);
    
    
    return response()->json([
        "success" => true,
        "message" => "Gestão Cadastrado com sucesso",
        "data" => $gestao

    ], 200);
}

public function retornarGestao()
{
    $gestao = Gestao::all();
    return response()->json([
        ' status' => true,
        'data' => $gestao
    ]);}


public function pesquisarPorGestao(Request $request)
{
    $gestao = Gestao::where('nome', 'like', '%' . $request->nome . '%')->get();

    if (count($gestao) > 0) {
        return response()->json([
            ' status' => true,
            'data' => $gestao
        ]);
    }
}
}
    


