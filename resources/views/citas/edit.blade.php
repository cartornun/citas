@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear cita</div>
                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::model($cita, [ 'route' => ['citas.update',$cita->id], 'method'=>'PUT']) !!}
                        <div class="form-group">
                            {!! Form::label('fecha_inicio', 'Fecha y hora inicio de la cita') !!}
                            <input type="datetime-local" id="fecha_inicio" name="fecha_inicio" class="form-control"
                                   value="{{Carbon\Carbon::createFromDate($cita->fecha_inicio)->format('Y-m-d\TH:i')}}"/>
                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha_fin', 'Fecha y hora fin de la cita') !!}

                            <input type="datetime-local" id="fecha_fin" name="fecha_fin" class="form-control"
                                   value="{{Carbon\Carbon::createFromDate($cita->fecha_fin)->format('Y-m-d\TH:i')}}"/>
                        </div>
                        <div class="form-group">
                            {!!Form::label('medico_id', 'Medico') !!}
                            <br>
                            {!! Form::select('medico_id', $medicos, $cita->medico_id, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('paciente_id', 'Paciente') !!}
                            <br>
                            {!! Form::select('paciente_id', $pacientes, $cita->paciente_id, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('localizacion_id', 'Localizacion') !!}
                            <br>
                            {!! Form::select('localizacion_id', $localizaciones,$cita->localizacion_id, ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection