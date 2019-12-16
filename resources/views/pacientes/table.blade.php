
<tbody>
<tr>
    <th>Nombre</th>
    <th>Apellidos</th>
    <th>Nuhsa</th>
    <th>Enfermedad</th>

    <th colspan="2">Acciones</th>
</tr>
@foreach ($pacientes as $paciente)


    <tr>
        <td>{{ $paciente->name }}</td>
        <td>{{ $paciente->surname }}</td>
        <td>{{ $paciente->nuhsa }}</td>
        <td>{{ $paciente->enfermedad->name }}</td>
        <td>
            {!! Form::open(['route' => ['pacientes.edit',$paciente->id], 'method' => 'get']) !!}
            {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
            {!! Form::close() !!}
        </td>
        <td>
            {!! Form::open(['route' => ['pacientes.destroy',$paciente->id], 'method' => 'delete']) !!}
            {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
            {!! Form::close() !!}

        </td>
    </tr>
@endforeach
</tbody>

