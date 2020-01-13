@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Citas</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'citas.create', 'method' => 'get']) !!}
                        <h1>Tu hora de salida es {{ $hora_fin  }}</h1>
                        {!!   Form::submit('Crear cita', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}
                        <br><br>
                        {!! Form::open(['route' => 'citas.citasPasadas', 'method' => 'get']) !!}
                        {!!   Form::submit('Citas pasadas', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Medico</th>
                                <th>Paciente</th>
                                <th>Localizacion</th>

                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($citas as $cita)


                                <tr>
                                    <td>{{ $cita->fecha_inicio }}</td>
                                    <td>{{ $cita->fecha_fin }}</td>
                                    <td>{{ $cita->medico->name }}</td>
                                    <td>{{ $cita->paciente->name}}</td>
                                    <td>{{ $cita->localizacion->full_name}}</td>
                                    <td>
                                        {!! Form::open(['route' => ['citas.edit',$cita->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['citas.destroy',$cita->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
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