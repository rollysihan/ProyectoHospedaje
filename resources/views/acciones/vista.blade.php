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
        ver lsita de los serviciso creados
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>N°</th>
                        <th>TITULO</th>
                        <th>DESCRIPCION</th>
                        <th>FOTO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($servicios as $servicio)
                        <tr>
                            <td>{{$loop->iteration}}</td><!--la varibale lopp nos brindara infromacion de cada ciclo en este caso el numeor de iteracion que  va a comenzar en 1    -->
                            <td>{{$servicio->titulo}}</td>
                            <td>{{$servicio->descripcion}}</td>
                            <td>
                                <img src="{{asset( $servicio->foto)}}" alt="" width="200">
                               </td>
                            <td>
                                
                                <a class="btn btn-info"  href="{{ route('servicio.editar',$servicio->id )}}">Editar</a><!--enviar la informacion del id a traves del enlace-->
                         

                                <form method="POST" action="{{ route('servicio.borrar',$servicio->id) }}" style="display: inline">
                                    @csrf
                                    @method('DELETE')<!--identifica el tipo de solicitud que es borar-->
                                    <button class="btn btn-success" type="submit" onclick="return confirm('¿Eliminar {{$servicio->titulo}}?')">Borrar</button>
                                    
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>
    </body>
    </html>
@endsection