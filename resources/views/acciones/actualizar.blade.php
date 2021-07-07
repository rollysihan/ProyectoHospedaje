<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicio</title>
</head>
<body>
    
    formulario para actualizar un nuevo servicio
    <form action="{{route('servicio.actualizar', $servicio->id )}}" class="form-horizontal" method="post" enctype="multipart/form-data">
        @csrf <!--directiva contra ataques de tipo csrf, lo cual proviene de un sitio malisioso
        esta dorectiva nos brinda de un token de seguridad a los formualrios, donde laravel automaticamente se encarga de
    comporbar el tokenn enviado con el token alamcenado-->
        @method('PATCH')

        <div >
          <h1 >Editar <span>Servicio</span></h1>
        </div>
        
        <br>

        <div class="form-group">
          <label for="" class="control-label">Nombre del servicio:</label>
        
          <input type="text" class="form-control" name="titulo" class="form-input" value="{{$servicio->titulo}}">
        </div>

        <div class="form-group">
            <label for="" class="control-label">descripcion</label>
            <input type="text" class="form-control" name="descripcion" value="{{ $servicio->descripcion }}">
        </div>
    
        <div class="form-group">
          <label for="" class="control-label" >Imagen:</label><br>

          <img src="{{asset( $servicio->foto)}}" alt="" width="200"><br>
          <input type="file" class="form-control"  name="foto" class="form-input" >
        </div>

        <input type="submit" class="btn-sumbit btn btn-success" value="actualizar">
      </form>

    
</body>
</html>