@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar duracion</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($duracion, [ 'route' => ['duracion.update',$duracion->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('fecha_inicio', 'Fecha inicio cita') !!}
                            {!! Form::text('fecha_inicio',$duracion->fecha_inicio,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('cita_id', 'Cita') !!}
                            <br>
                            {!! Form::select('cita_id', $cita, $duracion->cita_id, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha_fin', 'Fecha fin cita') !!}
                            {!! Form::text('fecha_fin',$duracion->fecha_fin,['class'=>'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection