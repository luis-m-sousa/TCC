<?php

namespace App\Http\Controllers;

use App\Models\Simulacao;
use Illuminate\Http\Request;

class historicoController extends Controller
{
    public function index(Request $request)
    {
        $usuarioId = auth()->user()->id;
        $historico = Simulacao::where('user_id', $usuarioId)
            ->orderBy('id', 'asc')
            ->paginate(5);

        return view('historico.index', ['historico' => $historico]);
    }
}
