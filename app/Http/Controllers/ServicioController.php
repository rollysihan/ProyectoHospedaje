<?php

namespace App\Http\Controllers;

use App\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicioController extends Controller
{
    //retornar al formualrio ara crear un servicio
    public function formvista(){
        return view('acciones.registro');
    }
    public function registrarservicio(Request $request){

        $imagen=$request->file('foto')->store('public/images');//recepcionando la url de la foto 
        //y almacenandolo con el metodo store en la carpeta public subcarpeta images de la carpeat raiz storage y tod a su ves que este almacenado
        //en la variabe $imagen
        //
        $url=Storage::url($imagen);//con esta isntruccion estamos diciendo que nuestra url de nuestra imagen
        //sea accesible desde la carpetar public y no desde la carpeta storage
     
        Servicio::create([
            'titulo'=>$request->input('titulo'),
            'descripcion'=>$request->input('descripcion'),
            'foto'=>$url
        ]);
        return back();
    }


    public function servicioVer(Request $request)
    {
        /*$servicios=Servicio::toBase()->get();*/
        $servicios=Servicio::toBase()->get();//obteniendo todos los datos de la tabla servicio
        return view('acciones.vista',compact('servicios'));//retornando a las vistas y enviando la varibale servicios a traves del metpdp compact
        //que me permite enviar variables sin el simbolo del dolar
        //el metodo compac nos va a crear un array que contiene una varibel y unn valro
        //la variable en este caso va ser $servicios y el valro va ser los datos de la tabla
        //ya para llamra a estos datos haremos uso de blade el bucle @foreach que cimple la misma funcion de su
        //contraparte de php
    }

    public function servicioBorrar($id){

        $servicio=Servicio::findOrFail($id);//buscar el registro a apartir del id

        if( Servicio::destroy($id) ){
            $url=str_replace('storage','public',$servicio->foto);
            /*return $url;*/
           /* Storage::delete('public/'.$servicio->foto);*/
            Storage::delete($url);//recuperar y eliminar de la carpeta storage
        }
         
        return back();


    }

    public function servicioEditar( $id ){ //recepcionar la informacion que nos envio de la url

        $servicio=Servicio::findOrFail($id); //obtengpo todos los datos a parate del id enviado y si no lo encuentra me manda un error
        return view('acciones.actualizar',compact('servicio'));
    }

    public function servicioActualizar(Request $request, $id)
    {
        /*$datosProducto=request()->except(['_token','_method']);//almacenar todos los datos excepto el token y el mwthod*/

        //si hay imagane que guarde en la carpeta img
        if($request->hasFile('foto')){

            $servicio=Servicio::findOrFail($id); //para obtener la imformacion antigua
            $url=str_replace('storage','public',$servicio->foto);
            Storage::delete($url);//para eliminar la imagen antigua  ubicaad en la carpeta publica 
            //dato que necesitamos modificar|//recolectar la informacion del campo foto||alamcenar en la carpeta img qu esa en public
            $imagen=$request->file('foto')->store('public/images');
            $url=Storage::url($imagen);

        }
        
        Servicio::where('id','=',$id)->update([

            'titulo'=>$request->titulo,
            'descripcion'=>$request->descripcion,
            'foto'=>$url


        ]);//donde el id es igual al id que me enviaron desde el formulario
        $producto=Servicio::findOrFail($id);
        return back();
 
    }

}
