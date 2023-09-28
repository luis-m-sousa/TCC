<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banco;
use App\Models\Taxa;
use App\Models\Tipo_taxa;
use Illuminate\Http\Request;

class CalculoMinimoController extends Controller
{
    public function index(){
        return view('calculoMinimo.create');
    }

    public function calcular(Request $request){
        $request->validate([
            'valor' => 'required|numeric|min:0',
            'parcela' => 'required|numeric|min:0',
        ],
        [
            'valor.required' => 'O campo valor é obrigatório.',
            'valor.numeric' => 'O campo valor deve ser um número.',
            'valor.min' => 'O valor mínimo para o campo valor é 0.',
            'parcela.required' => 'O campo parcela é obrigatório.',
            'parcela.numeric' => 'O campo parcela deve ser um número.',
            'parcela.min' => 'O valor mínimo para o campo parcela é 0.',
        ]
    );
    
    $valor = $request->valor;
    $parcela = $request->parcela;
    
    $tipos_taxa = Tipo_taxa::all();
    
    foreach ($tipos_taxa as $tipo) {
        $taxas = Taxa::join('banco', 'taxa.banco_id', '=', 'banco.id')
            ->where('taxa.tipo_taxa_id', $tipo->id)
            ->orderBy('taxa.valor', 'asc')
            ->select('banco.nome', 'taxa.valor')
            ->take(5)
            ->get();
    
        $tipo->taxas = $taxas;
    }
    
    return view('calculoMinimo.calcular', compact('valor', 'parcela', 'tipos_taxa'));
    }
    
}

