<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VwInformeCredito;
use App\Models\VwDetaInformeCredito;
use App\Models\VwCredito;
use Drnxloc\LaravelHtmlDom\HtmlDomParser;
use PDF;
class ReportController extends Controller
{
    function reportCredit($id){
        $credito = VwInformeCredito::find($id);
        $detaCredito = VwDetaInformeCredito::where('id',$credito->id)->get();

        return view('credits.credit-detail', compact('credito','detaCredito'));
    }


    public function generatePDF($id)
    {
        
        $credito = VwInformeCredito::find($id);
        $detaCredito = VwDetaInformeCredito::where('id',$credito->id)->get();

        $fecha = date("d-m-Y");
        $pdf = PDF::loadView('credits.reports.credit-report', compact('credito','detaCredito'));
        return $pdf->download('BALANCE DE CRÉDITO '.$credito->no_credito.' '.$credito->nombre.' '.$fecha.'.pdf');
    }

    // public function generatePDF2($id)
    // {
        
    //     $credito = VwInformeCredito::find($id);
    //     $detaCredito = VwDetaInformeCredito::where('id',$credito->id)->get();

    //     return view('credits.reports.credit-report', compact('credito','detaCredito'));
     
    // }


    public function generateRecipe($id)
    {
        $recibo = VwDetaInformeCredito::where('id_transaccion',$id)->first();
        $credito = VwCredito::where('id_credito',$recibo->id)->first();
        $fecha = date("d-m-Y");
        $saldoPendiente = $recibo->monto -$credito->cuota_mensual + $recibo->monto_mora;
        $pdf = PDF::loadView('credits.reports.recipe', compact('recibo','fecha','credito','saldoPendiente'));
        return  $pdf->download('Recibo '.$recibo->no_recibo.' '.$recibo->nombre.' '.$fecha.'.pdf');
    
    }
}
