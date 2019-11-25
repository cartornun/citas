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

        return view('localizacions/index', ['localizacions' => $localizaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $localizaciones = Localizacion::all()->pluck('name', 'id');

        return view('localizacions/create', ['localizacions' => $localizaciones]);
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

        return redirect()->route('localizacions.index');
    }
}
