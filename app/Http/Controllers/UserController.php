<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class UserController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('partials.admin.form.newUser');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //falta validacion

         $this->validate($request,[
            'name'=>'required',
            'email'=>'required:unique:email:exists:states',
            'password'=>'required',
            ]);


        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password = Hash::make($request->email);
        $user->save();
        return redirect('/home');
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

    public function userList()
    {
        //
        $userList = User::all();
        return view('partials.admin.table.userList')->with(['userList'=>$userList]);

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
        $user=User::find($id);
        return view('partials.admin.form.userEdit')->with(['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $user=User::find($request->id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $user= User::find($request->id);
        if($user->voting==1){

            if($request->ajax()){
                return response()->json([
                    'status'=>1,
                    'msj'=>'Usuario votando',
                    ]);
            }//
                
        }else{
            if(User::destroy($request->id))
                {
                 return response()->json([
                    'status'=>0,
                    'msj'=>'Usuario eliminado',
                    ]);            
                }else{
                    'status'=>503,
                    'msj'=>'Error al eliminar usuario',
                }// fin del else error
        }// fin del else
    }
}
