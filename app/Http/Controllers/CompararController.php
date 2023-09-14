<?php

namespace App\Http\Controllers;
use App\Models\Simulacao;
use Illuminate\Http\Request;


class CompararController extends Controller
{
    public function index(Request $request){
        $usuarioId = auth()->user()->id;
        $simulacoes = Simulacao::where('user_id', $usuarioId)->get();
        return view('historico.comparar', ['simulacoes' => $simulacoes]);
    }

    public function comparar(Request $request)
{
    $simulacao1Id = json_decode($request->input('simulacao1Id'));
    $simulacao2Id = json_decode($request->input('simulacao2Id'));

    return view('historico.comparacao', compact('simulacao1Id', 'simulacao2Id'));
}

    
}
