<?php

namespace App\Http\Controllers;

use App\Models\Frete;
use Illuminate\Http\Request;

class RastreamentoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $codigo = $request->codigo_rastreio;
        $frete = Frete::where('codigo_rastreio', 1234)->first();
        return view('frete.rastreamento', [
            'frete' => $frete
        ]);
    }
}
