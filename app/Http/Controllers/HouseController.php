<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TCasa;
use App\Models\VwCasa;
use App\Models\CDepartamento;
use App\Models\TImagenesCasa;
use Alert;

class HouseController extends Controller
{
    function getHouses(){
        $casas = VwCasa::all();

        $totalCasas =  $casas->count();
        return view('credits.casas',compact('casas','totalCasas'));
    }

    function addHouse(){
        $deptos = CDepartamento::all();
        return view('credits.add-house', compact('deptos'));
    }

    function saveHouse(Request $req){
   

        $req->validate([
            'address' => 'required',
            'price' => 'required',
            'monto' => 'required',
            'casa' => 'required',
            'block' => 'required',
            'pasaje' => 'required',
            'antes.*' => 'image|mimes:jpeg,png,jpg,gif,JPG,PNG,webp|max:15000', // Validar las imágenes
            'despues.*' => 'image|mimes:jpeg,png,jpg,gif,JPG,PNG,webp|max:15000', // Validar las imágenes

        ]);



        $newHouse= new TCasa();
        $newHouse->direccion = $req->address;
        $newHouse->precio =  $req->price;
        $newHouse->monto_invertido =  $req->monto;
        $newHouse->descripcion = $req->block.'-'.$req->casa.'-'.$req->pasaje;
        $newHouse->numero = $req->casa;
        $newHouse->block = $req->block;
        $newHouse->pasaje =$req->pasaje;
        $newHouse->id_depto = $req->depto;
        $newHouse->id_muni = $req->muni;
        $newHouse->estado = 1;
        $newHouse->save();
        if($req->file('antes'))
        {
            foreach ($req->file('antes') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $newHouseImages = new TImagenesCasa();
                $newHouseImages->id_casa = $newHouse->id_casa;
                $newHouseImages->img_url = $imageName;
                $newHouseImages->tipo =false;
                $newHouseImages->save();
            }
    
        }
      
        if($req->file('despues'))
        {
            foreach ($req->file('despues') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $newHouseImages = new TImagenesCasa();
                $newHouseImages->id_casa = $newHouse->id_casa;
                $newHouseImages->img_url = $imageName;
                $newHouseImages->tipo =true;
                $newHouseImages->save();
            }
    
        }
       


        alert()->success('SuccessAlert','La casa ha sido Registrada correctamente');

        return back();
    }

    function valueHouse(Request $req){
        $casa = TCasa::find($req->casa);
        $precio = $casa->precio;

        return view('credits.partials.precio-casa',compact('precio'));
    }


    function detailHouse($id){
        $casa = TCasa::find($id);
        $imagenesCasa = TImagenesCasa::where('id_casa',$id)->get();
        return view('credits.house-detail',compact('casa','imagenesCasa'));
    }

}
