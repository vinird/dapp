<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\Papeleta;
use App\Referendum;
use App\Multiple;
use App\DetalleMultiple;
use Carbon\Carbon;

class EventsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        //
        return view('partials.admin.events.eventForm');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
       $this->validate($request,[
        'nombreEvento'=>'required',
        'dpFechaInicio'=>'required',
        'dpFechaFinal' => 'required',
        'tipo_votacion'=>'required',
        'opcion_voto'=>'required',
        'avance'=>'required',
        ]);

        $fechaInicio= Carbon::parse($request->dpFechaInicio)->timestamp;
        $fechaFinal= Carbon::parse($request->dpFechaFinal)->timestamp;

        $evento= new Evento();
        $evento->nombreEvento= $request->nombreEvento;
        $evento->fechaInicio= $fechaInicio;
        $evento->fechaFinal= $fechaFinal;
        $evento->tipoVoto= $request->tipo_votacion;
        $evento->opcionVoto= $request->opcion_voto;
        if($request->avance=="si"){
            $evento->avance= 1;    
        } else if($request->avance == "no") {
            $evento->avance= 0;    
        }
        $evento->user_id=\Auth::user()->id;

        if($evento->save()) {
            if($request->papeleta_activo==1) {
                $this->validate($request,[
                    'iNombre'=>'required',
                ]);
                foreach ($request->iNombre as $num=> $nombre) {
                    $papeleta= new Papeleta();
                    $papeleta->evento_id= $evento->id;
                    $papeleta->option_id= $num;
                    $papeleta->nombre= $nombre;

                    $papeleta->save();
                }
            }

            if($request->referendum_activo==1) {
                $this->validate($request,[
                    'taPregunta'=>'required',
                ]);
                $referendum= new Referendum();
                $referendum->evento_id= $evento->id;
                $referendum->pregunta= $request->taPregunta;

                $referendum->save();
            }

            if($request->multiple_activo==1) {
                $this->validate($request,[
                    'taPreguntaMultiple'=>'required',
                ]);
                $multiple= new Multiple();
                $multiple->evento_id= $evento->id;
                $multiple->pregunta= $request->taPreguntaMultiple;
                $multiple->min= $request->iMinimo;
                $multiple->max= $request->iMaximo;
                if($multiple->save()) {
                    $this->validate($request,[
                        'iOpcionMultiple'=>'required',
                    ]);
                    foreach ($request->iOpcionMultiple as $num=> $opcion) {
                        $detalle= new DetalleMultiple();
                        $detalle->evento_id= $multiple->evento_id;
                        $detalle->option_id= $num;
                        $detalle->descripcion= $opcion;
                        $detalle->save();
                    }
                }
            }
        } else {
        }
        return redirect('home');
    }// fin de storage

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
