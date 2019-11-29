<?php

namespace App\Http\Controllers;

use App\Especialidad;
use App\Localizacion;
use App\Medico;
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
        $localizacion = Localizacion::all();

        return view('localizaciones/index', ['localizaciones' => $localizacion]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citas = Cita::all()->pluck('name', 'id');

        return view('localizaciones/create', ['citas' => $citas]);
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
            'lugar' => 'required|max:255'
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

        $Localizacion = Localizacion::find($id);




        return view('Localizaciones/edit',['localizaciones'=> $Localizacion]);
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
            'lugar' => 'required|max:255',

        ]);

        $Localizacion = Localizacion::find($id);
        $Localizacion->fill($request->all());

        $Localizacion->save();

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

        return redirect()->route('Localizaciones.index');
    }
}
