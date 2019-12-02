<?php

namespace App\Http\Controllers;

use App\Especialidad;
use App\Localizacion;
use App\Medico;
use App\Cita;
use Illuminate\Http\Request;

class LocalizacionController extends Controller
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
        $localizaciones = Localizacion::all();

        return view('localizaciones/index', ['localizaciones' => $localizaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('localizaciones/create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'hospital' => 'required|max:255',
            'consulta' => 'required|max:255'
        ]);
        $localizaciones = new Localizacion($request->all());
        $localizaciones->save();

        flash('Localizacion creada correctamente');

        return redirect()->route('localizaciones.index');
    }
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
        //

        $localizaciones = Localizacion::find($id);


        return view('localizaciones/edit',['localizaciones'=> $localizaciones]);
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
            'hospital' => 'required|max:255',
            'consulta' => 'required|max:255'

        ]);

        $localizaciones = Localizacion::find($id);
        $localizaciones->fill($request->all());

        $localizaciones->save();

        flash('Localizacion modificado correctamente');

        return redirect()->route('localizaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Localizacion = Localizacion::find($id);
        $Localizacion->delete();
        flash('localizacion borrado correctamente');

        return redirect()->route('localizaciones.index');
    }
}
