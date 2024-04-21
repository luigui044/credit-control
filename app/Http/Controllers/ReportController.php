<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VwInformeCredito;
use App\Models\VwDetaInformeCredito;
use App\Models\VwCredito;
use App\Models\VwCobrosUnico;
use App\Models\TPagosUnico;

use App\Models\VwRecibosPagosUnico;

use Drnxloc\LaravelHtmlDom\HtmlDomParser;
use PDF;
use Alert;
use ZipArchive;

use Carbon\Carbon;
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
        if($id !=0){
        
            $recibo = VwDetaInformeCredito::where('id_transaccion',$id)->first();
            $credito = VwCredito::where('id_credito',$recibo->id)->first();
            $cobroUnico =VwRecibosPagosUnico::where('id_credito',$recibo->id)->where('ban_generado',0)->get();
            $fecha = date("d-m-Y");
            $saldoPendiente =$credito->cuota_mensual + $recibo->monto_mora - $recibo->monto ;
            $pdf = PDF::loadView('credits.reports.recipe', compact('recibo','fecha','credito','saldoPendiente','cobroUnico'));
            $updateCobroUnico = TPagosUnico::where('id_credito',$recibo->id)->where('ban_generado',0)->get();
            foreach ($updateCobroUnico as $item) {
                if($item->restante == 0 )
                {
                    $item->ban_generado= 1;
                    $item->save();
                }
            
            }

            return  $pdf->download('Recibo '.$recibo->no_recibo.' '.$recibo->nombre.' '.$fecha.'.pdf');
        }
       else{
        set_time_limit(0);


            // Obtener la fecha actual
            $hoy = Carbon::now();
            // Calcular la última fecha del mes pasado
            $ultimaFechaMesPasado = $hoy->subMonth()->endOfMonth();
            // Formatear la fecha según tus necesidades
            $ultimaFechaMesPasadoFormateada = $ultimaFechaMesPasado->format('Y-m-d');
            $pdfs = [];

            $zipFileName = 'Recibos.zip';
            $zip = new ZipArchive;


            $recibos = VwDetaInformeCredito::where('fecha_cuota',$ultimaFechaMesPasadoFormateada)->get();
      
                foreach ($recibos as $recibo ) {
                    $credito = VwCredito::where('id_credito',$recibo->id)->first();
                    $fecha = date("d-m-Y");
                    $saldoPendiente =( $credito->cuota_mensual + $recibo->monto_mora )- $recibo->monto;
                    $pdf = PDF::loadView('credits.reports.recipe', compact('recibo','fecha','credito','saldoPendiente'));
                    $pdfs[] =[
                        'nombre' => 'Recibo_'.$recibo->no_recibo.'_'.$recibo->nombre.'_'.$fecha.'.pdf',
                        'contenido' => $pdf->output()
                    ] ;
                  
                }
                if ($zip->open(public_path($zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
                    
                    foreach ($pdfs as $pdf) {
                        $zip->addFromString($pdf['nombre'], $pdf['contenido']);
                    }
                    $zip->close();
                }


            return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);
          
       }
    
    }
}
