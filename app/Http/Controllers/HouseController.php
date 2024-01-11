<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TCasa;
use App\Models\VwCasa;
use Alert;

class HouseController extends Controller
{
    function getHouses(){
        $casas = VwCasa::all();
        $totalCasas =  $casas->count();
        return view('credits.casas',compact('casas','totalCasas'));
    }

    function addHouse(){

        return view('credits.add-house');
    }

    function saveHouse(Request $req){

        $req->validate([
            'address' => 'required',
            'price' => 'required',
            'desc'=> 'required'
        ]);



        $newHouse= new TCasa();
        $newHouse->direccion = $req->address;
        $newHouse->precio =  $req->price;
        $newHouse->descripcion = $req->desc;
        $newHouse->estado = 1;
        $newHouse->save();
        alert()->success('SuccessAlert','La casa ha sido actualizada correctamente');

        return back();
    }

    function valueHouse(Request $req){
        $casa = TCasa::find($req->casa);
        $precio = $casa->precio;

        return view('credits.partials.precio-casa',compact('precio'));
    }

}
