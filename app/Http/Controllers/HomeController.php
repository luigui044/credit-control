<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VwAcumuladoCredito;
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
        JavaScript::put([
            'acumulado' => $acumulado,
           
        ]);
        return view('home',compact('acumulado'));
        
    }
}
