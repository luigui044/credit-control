<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $creditos = TCredito::all();
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
        $newCredit = new TCredito();
        $newCredit->id_casa = $req->casa;
        $newCredit->id_cliente = $req->cliente;
        $newCredit->precio_casa = $req->price;
        $newCredit->saldo_restante = $req->price - $req->primaMount;
        $newCredit->monto_total = str_replace(',', '', $req->monto) ;
        $newCredit->tiempo_total = $req->years;
        $newCredit->fecha_inicio = $req->fecIni;
        $newCredit->fecha_fin = $req->fecFin;
        $newCredit->tasa_interes_anual = $req->interes;
        if ($req->interes =='1') {
            $newCredit->costo_seguro= 15;
        }
        else
        {
            $newCredit->costo_seguro= 0;

        }
        $newCredit->seguro_deuda = $req->seguro;
        $newCredit->prima = $req->prima;
        $newCredit->save();

        $casa = TCasa::find($req->casa);
        $casa->estado= 3;
        $casa->save();
        $cliente = TCliente::find($req->cliente);
        $cliente->estado = 4;
        $cliente->save();

        return back();
    }
    

}
