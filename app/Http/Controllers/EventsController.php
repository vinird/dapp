<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\Papeleta;
use App\Referendum;
use App\Multiple;
use App\DetalleMultiple;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Mail;
use \App\Mail\NotificarVotantes;

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

        if($evento->save()){
            // return back();
        } else {
            // return back();
        }

        if($request->papeleta_activo==1) {
            foreach ($request->iNombre as $num=> $nombre) {
                $papeleta= new Papeleta();
                $papeleta->evento_id= $evento->id;
                $papeleta->option_id= $num;
                $papeleta->nombre= $nombre;

                $papeleta->save();
            }
        }

        if($request->referendum_activo==1) {
            $referendum= new Referendum();
            $referendum->evento_id= $evento->id;
            $referendum->pregunta= $request->taPregunta;

            $referendum->save();
        }

        if($request->multiple_activo==1) {
            $multiple= new Multiple();
            $multiple->evento_id= $evento->id;
            $multiple->pregunta= $request->taPreguntaMultiple;
            $multiple->min= $request->iMinimo;
            $multiple->max= $request->iMaximo;
            $multiple->save();

            foreach ($request->iOpcion as $num=> $opcion) {
                $detalle= new DetalleMultiple();
                $detalle->multiple_id= $multiple->evento_id;
                $detalle->option_id= $num;
                $detalle->descripcion= $opcion;
                $detalle->save();
            }
        }

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

    public function list()
    {
        return view('partials.admin.table.eventList')->with(['events' => Evento::all()]);
    }

    public function addMailsToEvents($idEvent) 
    {
        $event = Evento::find($idEvent);
        return view('partials.admin.events.mails')->with(['event' => $event]);
    }

    public function asignarCorreos(Request $request) 
    {
        $mails = [];
        if ($file = $request->file('_file') != null) {
            try {
                $file = $request->file('_file');
                $formato = \File::extension($file->getClientOriginalName());
                $content = \File::get($file);

                $contentArray = explode("\n", $content);

                $mailList = [];

                foreach($contentArray as $line) {
                    if ($line != "") {
                        array_push($mailList, trim($line));
                    }
                }
                $mails = $mailList;

            } catch (Illuminate\Contracts\Filesystem\FileNotFoundException $exception) {
                
            }
        } else { // Si el archivo es vacio
            $mails = $request->correo;
        }

        foreach ($mails as $key) {
            $result = User::where('email', '=', $key)->get();
            if (count($result) > 0) {
                flash('El correo '.$key.' ya existe en la base de datos')->error()->important();
                return back();
            }
        }
        foreach ($mails as $key) {
            $user = new User();
            $user->name = $key;
            $user->email = $key;
            $user->password = "xxxxxxxxxxx";
            $user->rol = 2;
            $user->evento_id = $request->evento_id;
            $user->save();
        }
        $evento = Evento::find($request->evento_id);
        $evento->correosAsignados = 1;
        $evento->save();
        flash('Lista de correos agregada al evento')->important();
        return redirect('/listEvent');
    }

    public function notificarCorreos($idEvento) 
    {
        $users = User::where('evento_id', '=', $idEvento)->get();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new NotificarVotantes($user));
            # code...
        }
        flash('Notificaciones enviadas al correo de la lista de votantes.')->important();
        return back();
    }
}
