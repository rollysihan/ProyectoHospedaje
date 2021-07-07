@extends('MenuAdmin.menuNav')
@section('contenido')
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Servicio</title>
  </head>
  <body>
      <form action="{{ route('registrar.servicio') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
          @csrf <!--directiva contra ataques de tipo csrf, lo cual proviene de un sitio malisioso
          esta dorectiva nos brinda de un token de seguridad a los formualrios, donde laravel automaticamente se encarga de
      comporbar el tokenn enviado con el token alamcenado-->
          <div >
            <h1 >Crear <span>Nuevo servicio</span></h1>
          </div>
          
          <br>
          <div class="form-group">
            <label for="" class="control-label">Nombre del servicio:</label>
          
            <input type="text" class="form-control" name="titulo" class="form-input" required>
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1"  class="control-label">Descripcion:</label><br>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" rows="3" cols="5"></textarea>
          </div>
      
          <div class="form-group">
            <label for="" class="control-label" >Imagen:</label><br>
            <input type="file" class="form-control"  name="foto" class="form-input" required>
          </div>

          <input type="submit" class="btn-sumbit btn btn-success" value="Registrar Servicio">
        </form>

      
  </body>
  </html>
@endsection