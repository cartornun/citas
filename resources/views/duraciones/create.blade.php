@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear duracion</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'duraciones.store']) !!}
                        <div class="form-group">
                            {!! Form::label('fecha_inicio', 'Fecha inicio cita') !!}
                            {!! Form::text('fecha_inicio',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha_fin', 'Fecha fin cita') !!}
                            {!! Form::text('fecha_fin',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection