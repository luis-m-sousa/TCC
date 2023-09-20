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

    public function comparar(Request $request, $simulacao1Id, $simulacao2Id){
        $simulacao1 = $request->input('simulacao1Id');
        $simulacao2 = $request->input('simulacao2Id');
        $simulacao1 = Simulacao::where('id', $simulacao1Id)->first();
        $simulacao2 = Simulacao::where('id', $simulacao2Id)->first();
    
        return view('historico.comparacao', compact('simulacao1', 'simulacao2'));
    }
    
    
}
