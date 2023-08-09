<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Simulacao;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as DB;
class SimulacaoController extends Controller
{

    function index()
    {
        return view('simulacao.create');
    }

    public function historico(Request $request)
    {
        $usuarioId = auth()->user()->id;
        $historico = Simulacao::where('user_id', $usuarioId)
            ->orderBy('id', 'asc')
            ->paginate(5);
        return view('historico.index', ['historico' => $historico]);
    }

    public function store(Request $request)
    {
        // Validação dos dados da simulação
        $request->validate([
            'valor' => 'required|numeric|min:0',
            'taxa' => 'required|numeric|min:0',
            'tempo' => 'required|numeric|min:0',
            'parcela' => 'required|numeric|min:0',
        ],
        [
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
        
        $user_id = Auth::id();
        $simulacao->user_id = $user_id;

        // Salva a simulação no banco de dados
        $simulacao->save();

        // Retorna uma resposta de sucesso
        return back()->with('success', 'Simulação salva com sucesso! Acesse o histórico de simulações para visualizá-la');
    }
    public function delete(Request $request, $id) {
        $obj = Simulacao::findOrFail($id);
        $obj->delete();

        return redirect()->route('historico.index');
    }

    public function edit(Request $request, $id) {
        $simulacao = Simulacao::findOrFail($id);
        return view('simulacao.edit', ['simulacao' => $simulacao]);
    }

    public function update(Request $request, $id) {

        $simulacao = Simulacao::findOrFail($id);
        $simulacao->valor = $request->valor;
        $simulacao->taxa = $request->taxa;
        $simulacao->tempo = $request->tempo;
        $simulacao->parcela = $request->parcela;
        $simulacao->save();

        return redirect()->route('historico.index');
    }

}
