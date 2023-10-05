<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Simulacao;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class PdfController extends Controller
{
    public function geraPdf(Request $request, $id){

        $data = Simulacao::findOrFail($id);
        $pdf = Pdf::loadView('historico.exportar', compact('data'));

        return $pdf->setPaper('a4')->stream('Simulação.pdf');
    }
}
