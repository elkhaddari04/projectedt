<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;


class ProfController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      // هدشي مبغاش يخدم  $this->middleware('auth::api');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return user::latest()->paginate(2);
        return       DB::table('users')->get();
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
            'name' => 'required|string|max:191',
            'pernom' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:professeurs',
            'password' => 'required|string|min:6'
        ]);


        return Professeur::create([
            'name'=>$request['name'],
            'pernom'=>$request['pernom'],
            'email'=>$request['email'],
            'password'=>$request['password'],


        ]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prof=Professeur::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'pernom' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:professeurs,email,'.$prof->id,
            'password' => 'sometimes|min:6'
        ]);

        $prof->update($request->all());
        return ['massge'=>$request];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Professeur=Professeur::findOrFail($id);
        $Professeur->delete();
        return['message'=>'daadg'];
    }
}
