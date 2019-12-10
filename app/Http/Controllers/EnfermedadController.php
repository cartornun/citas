<?php

namespace App\Http\Controllers;

use App\Enfermedad;
use App\Especialidad;
use App\Medico;
use App\Paciente;
use Illuminate\Http\Request;

class EnfermedadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enfermedades = Enfermedad::all();

        return view('enfermedades/index',['enfermedades'=>$enfermedades]);

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidades = Especialidad::all()->pluck('name','id');




        return view('enfermedades/create',['especialidades'=>$especialidades]);


        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'especialidad_id' => 'required|exists:especialidads,id',

        ]);
        $enfermedad = new Enfermedad($request->all());
        $enfermedad->save();
        //
        flash('Enfermedad creada correctamente');

        return redirect()->route('enfermedades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enfermedades = Enfermedad::find($id);

        $especialidades = Especialidad::all()->pluck('name','id');



        return view('enfermedades/edit',['enfermedades'=> $enfermedades, 'especialidades'=>$especialidades ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'especialidad_id' => 'required|exists:especialidads,id',

        ]);

        $enfermedad = Enfermedad::find($id);
        $enfermedad->fill($request->all());

        $enfermedad->save();

        flash('Enfermedad modificado correctamente');

        return redirect()->route('enfermedades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enfermedad = Enfermedad::find($id);
        $enfermedad->delete();
        flash('Enfermedad borrado correctamente');

        return redirect()->route('enfermedades.index');
    }
}
