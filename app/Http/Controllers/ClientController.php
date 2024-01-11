<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\TCliente;
use App\Models\CDepartamento;
use App\Models\CMunicipio;
use Alert;

class ClientController extends Controller
{
    function acreedores(){
        
        $clientes  = TCliente::all();
        $total =$clientes->count();
        return view('credits.clientes',compact('clientes','total'));

    }

    function addClient(){
        $deptos = CDepartamento::all();
        return view('credits.add-client',compact('deptos'));
    }
    function editClient($id){
        $deptos = CDepartamento::all();
       
        $cliente = TCliente::find($id);
        $munis = CMunicipio::where('id_depto',$cliente->depto)->get();
        return view('credits.edit-client',compact('deptos','cliente','munis'));
    }
    function filtMuni(Request $req){
        $munis = CMunicipio::where('id_depto',$req->depto)->get(); 
        return view('credits.partials.municipios',compact('munis'));
    }

    function saveClient(Request $req){
       $reglas=[
            'name' => 'required',
            'age' => 'required',
            'dui' => 'required|unique:t_clientes,dui',
            'ocupacion' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'depto' => 'required',
            'muni' => 'required',
        ];

        $mensajes = [
            'dui.required' => 'El Campo de DUI es requerido.',
            'dui.unique' => 'El DUI ingresado ya está en uso.',
        ];

        $validator = Validator::make($req->all(), $reglas, $mensajes);


        if ($validator->fails()) {
     
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

            $cliente = new TCliente();
            $cliente->nombre = $req->name;
            $cliente->edad = $req->age;
            $cliente->dui = $req->dui;
            $cliente->oficio = $req->ocupacion;
            $cliente->correo = $req->email;
            $cliente->telefono= $req->phone;
            $cliente->direccion = $req->address;
            $cliente->depto = $req->depto;
            $cliente->muni = $req->muni;
            $cliente->save();
            alert()->success('SuccessAlert','El cliente '.$req->name.' ha sido registrado    éxitosamente.');

            return back()->with('success','El cliente '.$req->name.' ha sido registrado éxitosamente.');

    }

    function updateClient(Request $req, $id){
        $reglas=[
            'name' => 'required',
            'age' => 'required',
            'dui' => 'required',
            'ocupacion' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'depto' => 'required',
            'muni' => 'required',
        ];

        $mensajes = [
            'dui.required' => 'El Campo de DUI es requerido.',
       
        ];

        $validator = Validator::make($req->all(), $reglas, $mensajes);


        if ($validator->fails()) {
     
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

            $cliente = TCliente::find($id);
            $cliente->nombre = $req->name;
            $cliente->edad = $req->age;
            $cliente->dui = $req->dui;
            $cliente->oficio = $req->ocupacion;
            $cliente->correo = $req->email;
            $cliente->telefono= $req->phone;
            $cliente->direccion = $req->address;
            $cliente->depto = $req->depto;
            $cliente->muni = $req->muni;
            $cliente->save();
            alert()->success('SuccessAlert','El cliente '.$req->name.' ha sido actualizado éxitosamente.');
            return back()->with('success','El cliente '.$req->name.' ha sido actualizado éxitosamente.');

    }


    function disableClient($id,$state){

        $cliente = TCliente::find($id);
        $cliente->estado = $state;
        $cliente->save();
        $clientes  = TCliente::all();
        return view('credits.partials.clientes',compact('clientes'));
    }

    function getClient($id){
        $cliente = TCliente::find($id);
        $depto = CDepartamento::find($cliente->depto);
        $muni = CMunicipio::find($cliente->muni);
        return view('credits.partials.cliente',compact('cliente','muni','depto'));
    }
}
