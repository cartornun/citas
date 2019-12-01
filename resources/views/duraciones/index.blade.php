@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Duraciones</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'duraciones.create', 'method' => 'get']) !!}
                        {!! Form::submit('Crear duracion', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha_inicio</th>
                                <th>Fecha_fin</th>
                                <th>Cita</th>
                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($duraciones as $duracion)


                                <tr>
                                    <td>{{ $duracion->fecha_inicio }}</td>
                                    <td>{{ $duracion->fecha_fin }}</td>
                                    <td>{{ $duracion->cita->fecha_hora}}</td>

                                    <td>
                                        {!! Form::open(['route' => ['duraciones.edit',$duracion->id], 'method' => 'get']) !!}
                                        {!! Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['duraciones.destroy',$duracion->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
