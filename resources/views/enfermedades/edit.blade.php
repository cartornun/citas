@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">editar enfermedad</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($enfermedad, [ 'route' => ['enfermedades.update',$enfermedad->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Nombre de la enfermedad') !!}
                            {!! Form::text('name',$enfermedad->name,['class'=>'form-control', 'required', 'autofocus']) !!}





                        </div>


                        <div class="form-group">
                            {!!Form::label('paciente_id', 'Paciente') !!}
                            <br>
                            {!! Form::select('paciente_id', $pacientes, $enfermedad->paciente_id, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('especialidad_id', 'especialidad') !!}
                            <br>
                            {!! Form::select('especialidad_id', $especialidades, $enfermedad->especialidad_id, ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection