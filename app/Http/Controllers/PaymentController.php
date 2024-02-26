<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TCliente;
use App\Models\TCredito;
use App\Models\TPagosUnico;
use App\Models\TTransaccione;

use Illuminate\Support\Facades\Validator;
use App\Models\VwCobrosUnico;
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

///Generación de cobros únicos
    function getBills($ban =null){
        $cobrosUnicos = VwCobrosUnico::all();

        return view('transactions.cobros-unicos', compact('cobrosUnicos'));
    }
    function createBill(){
        $clientes = TCliente::select('id_cliente','nombre')->where('estado',1)->get();

        return view('transactions.generar-cobro',compact('clientes'));
    }
    function saveBill(Request $req){
       
        TPagosUnico::create([
            'id_cliente' => $req->cliente,
            'id_credito' => $req->credito,
            'desc_pago'=> $req->concepto,
            'monto' => $req->monto,
            'mora' => $req->mora,
            'total' => $req->total,
            'restante' => $req->total,
            'fecha_vencimiento' => $req->fecha,
            'no_recibo' =>  $req->recibo,
            'estado' => $req->estado
            
         ]);
         alert()->success('Confirmación','Pago registrado éxitosamente.');
       return  redirect()->route('getBills');
    }

    function processBill(){
        $clientes = TCliente::where('estado',1)->get();
        return view('transactions.unique-payment', compact('clientes'));

    }


    function getBillsByIdCredits($id){
        $cobros = VwCobrosUnico::where('id_credito',$id)->whereIn('estado',[1,3])->get();
        return view('transactions.partials.cobros',compact('cobros'));
    }


    function saveUniquePayment(Request $request){

        $reglas=[
            'credito' => 'required',
            'cobro' => 'required',
            'monto' => 'required',
            'fecha' => 'required',
            'recibo' => 'required|
            '
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

        $idCobro = $request->cobro;

        $cobro = TPagosUnico::find($idCobro);

        if($cobro->mora > 0)
        {
            $moraAplicada = 1;
        }
        else{
            $moraAplicada = 0;
        }


        $idCredito = $request->credito;
        $montoPago = $request->monto;
        $fecha = $request->fecha;
        $noRecibo = $request->recibo;
        

        try {
           
            TTransaccione::create([
                'id_credito' => $idCredito,
                'tipo_transaccion' => 'Pago Único',
                'monto' => $montoPago,
                'fecha' => $fecha,
                'no_recibo'=> $noRecibo,
                'mora_aplicada' => $moraAplicada,
                'monto_mora' => $cobro->mora,
                'fecha_cuota' => $cobro->fecha_vencimiento,
                'estado' => 1
            ]);

            $validarPago = ( $cobro->restante - $montoPago );
            if($validarPago == 0){
                $cobro->estado = 2;
                $cobro->ban_generado =1;
                $cobro->restante = $validarPago;

                $cobro->save();
            }
            else
            {
                $cobro->restante = $validarPago;
                $cobro->save();
            }

            alert()->success('Confirmación','Pago registrado éxitosamente.');

            return back();

        } catch (\Exception $e) {
            alert()->error('Alerta',$e->getMessage());

            return back();
        }
    }

}
