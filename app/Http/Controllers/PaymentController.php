<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TCliente;
use App\Models\TCredito;
use Illuminate\Support\Facades\Validator;

use Alert;
use DB;
class PaymentController extends Controller
{
    function payCredit(){

        $clientes = TCliente::where('estado',1)->get();
        return view('transactions.payment', compact('clientes'));


    }

    function getCreditsByIdClient($id){
        $creditos = TCredito::where('id_cliente',$id)->get();
        return view('transactions.partials.credito',compact('creditos'));
    }

    function getCuotaByIdCredit($credito){
        $cuota = TCredito::select('cuota_mensual')->where('no_credito', $credito)->first();
        return view('transactions.partials.cuota',compact('cuota'));
    }

    function savePayment(Request $request){

        $reglas=[
            'credito' => 'required',
            'monto' => 'required',
            'fecha' => 'required',
            'recibo' => 'required|unique:t_transacciones,no_recibo'
        ];

        $mensajes = [ 
            'recibo.unique' => 'El número de recibo ya se encuentra en uso',
        ];

        $validator = Validator::make($request->all(), $reglas, $mensajes);


        if ($validator->fails()) {
     
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $idCredito = $request->credito;
        $montoPago = $request->monto;
        $fecha = $request->fecha;
        $noRecibo = $request->recibo;
        try {
            DB::statement('CALL pa_reg_pago(?,?,?,?)',[$idCredito,$montoPago,$fecha,$noRecibo]);
            alert()->success('Confirmación','Pago registrado éxitosamente.');

            return back();

        } catch (\Exception $e) {
            alert()->error('Alerta',$e->getMessage());

            return back();
        }
    }

}
