<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Servicio extends Model
{
   
    use Notifiable;//laravel brinda el sorpte para envio de notificaiones mediante una
    //variedad de canales incluyendo correo, msm, broascat

    //definir los parametros que van a ser llenables
    protected $fillable=['titulo','descripcion','foto'];
}
