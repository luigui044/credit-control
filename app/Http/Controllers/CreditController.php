<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\VwCredito;
use App\Models\TCliente;
use App\Models\VwCasa;
use App\Models\TCasa;
use App\Models\TCredito;
use App\Models\CDepartamento;
use App\Models\CMunicipio;
use Alert;
class CreditController extends Controller
{
   

    ///////////////////////////////CREDITOS////////////////////////

    function getCredits(){
        $creditos = VwCredito::all();
        $totalCreditos =  $creditos->count();
        return view('credits.creditos',compact('creditos','totalCreditos'));
    }

    function addCredits(){
        $clientes = TCliente::where('estado',1)->get();
        $casas = VwCasa::where('estado','Disponible')->get();
        return view('credits.add-credits',compact('clientes','casas'));
    }
    
    function saveCredit(Request $req)
    {
        $maxNoCredit = TCredito::max('no_contrato');
        $casa = TCasa::find($req->casa);
    
        $newCredit = new TCredito();
        $newCredit->no_contrato = $maxNoCredit +1;
        $newCredit->no_credito = ($maxNoCredit+1).'-'.$casa->numero.'-'.$casa->block.'-'.$casa->pasaje;
        $newCredit->id_casa = $req->casa;
        $newCredit->id_cliente = $req->cliente;
        $newCredit->precio_casa = $req->price;
        $newCredit->saldo_restante = $req->price - $req->primaMount;
        $newCredit->monto_total = str_replace(',', '', $req->monto) ;
        $newCredit->tiempo_total = $req->years;
        $newCredit->fecha_inicio = $req->fecIni;
        $newCredit->fecha_fin = $req->fecFin;
        $newCredit->tasa_interes_anual = $req->interes;
        $newCredit->cuota_mensual_real = $req->cuota;


        if ($req->interes =='1') {
            $newCredit->costo_seguro= 15;
        }
        else
        {
            $newCredit->costo_seguro= 0;

        }
        $newCredit->seguro_deuda = $req->seguro;
        $newCredit->prima = str_replace(",", "", $req->primaMount) ;
        $newCredit->save();

       
        $casa->estado= 3;
        $casa->save();
        
        ///se anula ya que si el cliente es 4 no puedo regisrarle mas creditos
        // $cliente = TCliente::find($req->cliente);
        // $cliente->estado = 4;
        // $cliente->save();

        return back();
    }
    

}
