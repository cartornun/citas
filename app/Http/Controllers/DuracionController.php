<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Duracion;
use App\Enfermedad;
use App\Especialidad;
use App\Medico;
use Illuminate\Http\Request;

class DuracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $duraciones = Duracion::all();

        return view('duraciones/index',['duraciones'=>$duraciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citas = Cita::all()->pluck('full_name','id');

        return view('duraciones/create',['citas'=>$citas]);
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
            'fecha_inicio' => 'required|date|after:now',
            'fecha_fin' => 'required|date|after:now',


        ]);
        $duracion = new Duracion($request->all());
        $duracion->save();

        flash('Duracion creada correctamente');

        return redirect()->route('duraciones.index');
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
        $duracion = Duracion::find($id);

        return view('duracion/edit',['duracion'=> $duracion ]);
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
            'fecha_inicio' => 'required|date|after:now',
            'fecha_fin' => 'required|date|after:now',
        ]);

        $duracion = Duracion::find($id);
        $duracion->fill($request->all());

        $duracion->save();

        flash('Duración modificada correctamente');

        return redirect()->route('duraciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $duracion = Duracion::find($id);
        $duracion->delete();
        flash('Duracion borrada correctamente');

        return redirect()->route('duraciones.index');
    }
}
