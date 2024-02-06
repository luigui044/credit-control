<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VwAcumuladoCredito;
use App\Models\VwClientesMora;
use App\Models\TTransaccione;
use App\Models\VwPagosCliente;
use JavaScript;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $acumulado = VwAcumuladoCredito::first();
        $estadoCuotas = VwClientesMora::selectRaw('COUNT(CASE WHEN cuotas_pendiente = 0 THEN 1 END) AS clientes_al_dia')
        ->selectRaw('COUNT(CASE WHEN cuotas_pendiente > 0 THEN 1 END) AS clientes_con_mora')
        ->first();
        $totalTransacciones = TTransaccione::selectRaw('SUM(monto) as monto')->first();
        $clientesMora = VwClientesMora::where('cuotas_pendiente', '>' ,0)->get();
        $pagosClientes =VwPagosCliente::all();
        JavaScript::put([
            'acumulado' => $acumulado,
           'estadoCuotas' => $estadoCuotas,
           'pagosClientes' => $pagosClientes
        ]);
        return view('home',compact('acumulado','clientesMora','totalTransacciones'));
        
    }
}
