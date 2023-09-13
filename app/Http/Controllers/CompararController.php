<?php

namespace App\Http\Controllers;

use App\Models\Simulacao;
use Illuminate\Http\Request;

class CompararController extends Controller
{
    public function index(){
        $simulacoes = Simulacao::all();
        return view('historico.comparar', ['simulacoes' => $simulacoes]);
    }

    public function comparar($simulacao1Id, $simulacao2Id){
        $simulacao1 = Simulacao::where('id', $simulacao1Id)->first();
        $simulacao2 = Simulacao::where('id', $simulacao2Id)->first();
    
        return view('comparacao', compact('simulacao1', 'simulacao2'));
    }
    
    
}
