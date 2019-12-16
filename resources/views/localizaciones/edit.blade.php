@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar localizacion</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($localizaciones, [ 'route' => ['localizaciones.update',$localizaciones->id], 'method'=>'PUT']) !!}


                        <div class="form-group">
                            {!! Form::label('hospital', 'Hospital de la cita') !!}
                            {!! Form::text('hospital',$localizaciones->hospital,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('consulta', 'Consulta de la cita') !!}
                            {!! Form::text('consulta',$localizaciones->consulta,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection