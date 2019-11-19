<?php

namespace App\Http\Controllers;

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
        $localizaciones = Localizacion::all();

        return view('localizacions/index',['localizacions'=>$localizaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $localizaciones = Localizacion::all()->pluck('name','id');

        return view('localizacions/create',['localizacions'=>$localizaciones]);
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
            'lugar' => 'required|max:255'
        ]);
        $localizaciones = new Localizacion($request->all());
        $localizaciones->save();

        flash('Localizacion creada correctamente');

        return redirect()->route('localizacions.index');
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
        $localizaciones = Localizacion::find($id);

        return view('localizacions/edit',['localizacion'=> $localizaciones]);
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
            'lugar' => 'required|max:255'
        ]);

        $localizaciones = Localizacion::find($id);
        $localizaciones->fill($request->all());

        $localizaciones->save();

        flash('Localizacion modificada correctamente');

        return redirect()->route('localizacions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $localizaciones = Localizacion::find($id);
        $localizaciones->delete();
        flash('Localizacion borrada correctamente');

        return redirect()->route('localizacions.index');
    }
}
