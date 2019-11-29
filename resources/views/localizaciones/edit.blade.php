@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">editar localizacion</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($localizacion, [ 'route' => ['localizaciones.update',$localizacion->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('lugar', 'Lugar de la localizacion') !!}
                            {!! Form::text('lugar',$lugar->name,['class'=>'form-control', 'required', 'autofocus']) !!}





                        </div>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection