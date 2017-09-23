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
            'email'=>'email',
            'email' => 'unique:users,email',
            'password'=>'required',
            ]);


        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password = Hash::make($request->email);
        $user->save();
        flash('Usuario agregado')->important();

        return redirect('userList');
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
        $this->validate($request,[
            'name'=>'required',
            ]);

        $user=User::find($request->id);
        $user->name=$request->name;
        $user->save();
        flash('Usuario actualizado')->important();
        return back();
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
        if(User::destroy($request->id))
        {
        return "success";            
        }else{
            return "error";
        }
    }
}
