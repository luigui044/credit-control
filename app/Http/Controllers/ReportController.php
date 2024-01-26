<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VwInformeCredito;
use App\Models\VwDetaInformeCredito;
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

        $pdf = PDF::loadView('credits.reports.credit-report', compact('credito','detaCredito'));;
        return $pdf->download('Reporte_credito_'.$id.'.pdf');
      
    }

    public function generatePDF2($id)
    {
        
        $credito = VwInformeCredito::find($id);
        $detaCredito = VwDetaInformeCredito::where('id',$credito->id)->get();

        return view('credits.reports.credit-report', compact('credito','detaCredito'));
     
    }
}
