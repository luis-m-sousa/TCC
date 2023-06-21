<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Simulacao;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Auth;

class SimulacaoController extends Controller
{

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
            'valor' => 'required',
            'taxa' => 'required',
            'tempo' => 'required',
            'parcela' => 'required',
        ]);

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
}
