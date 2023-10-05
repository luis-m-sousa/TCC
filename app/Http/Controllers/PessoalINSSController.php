<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use App\Models\Simulacao;
use App\Models\Taxa;
use App\Models\Tipo_taxa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PessoalINSSController extends Controller
{
    public function index()
    {
        return view('pessoalINSS.create');
    }
    public function store(Request $request)
    {

        $request->validate(
            [
                'valor' => 'required|numeric|min:0',
                'taxa' => 'required|numeric|min:0',
                'tempo' => 'required|numeric|min:0',
                'parcela' => 'required|numeric|min:0',
                'titulo' => 'required',
            ],
            [
                'titulo.required' => 'O campo de título é obrigatório',
                'valor.required' => 'O campo valor é obrigatório.',
                'valor.numeric' => 'O campo valor deve ser um número.',
                'valor.min' => 'O valor mínimo para o campo valor é 0.',
                'taxa.required' => 'O campo taxa é obrigatório.',
                'taxa.numeric' => 'O campo taxa deve ser um número.',
                'taxa.min' => 'O valor mínimo para o campo taxa é 0.',
                'tempo.required' => 'O campo tempo é obrigatório.',
                'tempo.numeric' => 'O campo tempo deve ser um número.',
                'tempo.min' => 'O valor mínimo para o campo tempo é 0.',
                'parcela.required' => 'O campo parcela é obrigatório.',
                'parcela.numeric' => 'O campo parcela deve ser um número.',
                'parcela.min' => 'O valor mínimo para o campo parcela é 0.',
            ]
        );

        // Cria uma nova instância do modelo Simulacao e define os valores dos campos
        $simulacao = new Simulacao();
        $simulacao->valor = $request->valor;
        $simulacao->taxa = $request->taxa;
        $simulacao->tempo = $request->tempo;
        $simulacao->parcela = $request->parcela;
        $simulacao->titulo = $request->titulo;
        $simulacao->tipo = "Pessoal Consignado INSS";
        $simulacao->data_criacao = Carbon::now();

        $user_id = Auth::id();
        $simulacao->user_id = $user_id;

        // Salva a simulação no banco de dados
        $simulacao->save();

        // Retorna uma resposta de sucesso
        return back()->with('success', 'Simulação salva com sucesso! Acesse a aba "Minhas Simulações" para visualizá-la.');
    }
    public function getTaxa($nome)
    {
        $banco = Banco::where('nome', $nome)->first();
        $tipo_taxa = Tipo_taxa::where('id', '4')->first();

        if ($banco && $tipo_taxa) {
            $taxa = Taxa::where('banco_id', $banco->id)
                ->where('tipo_taxa_id', $tipo_taxa->id)
                ->first();
            if ($taxa) {
                return response()->json($taxa->valor);
            }
        }
        return response()->json(null);
    }

    public function getBancos(Request $request)
    {
        $search = $request->get('q');
        $result = Banco::where('nome', 'LIKE', '%' . $search . '%')
            ->whereHas('taxa', function ($query) {
                $query->where('tipo_taxa_id', 4);
            })->get();
        return response()->json($result);
    }
}
