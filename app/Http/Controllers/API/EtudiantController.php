<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Etudiant;
use DB;

class EtudiantController extends Controller
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

        return      Etudiant::latest()->paginate(5);;
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
            'fullname' => 'required|string|max:191',
            'apogie' => 'required|string|max:191',
            'filiere_id' => 'required|max:191',
        ]);


        return Etudiant::create([
            'fullname'=>$request['fullname'],
            'apogie'=>$request['apogie'],
            'filiere_id'=>$request['filiere_id'],


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
        $profEmp=DB::select('select * from etudiants where filiere_id = :id', ['id' => $id]);
        return $profEmp;
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
        $Etudiant=Etudiant::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'pernom' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:professeurs,email,'.$Etudiant->id,
            'password' => 'sometimes|min:6'
        ]);

        $Etudiant->update($request->all());
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
        $Etudiant=Etudiant::findOrFail($id);
        $Etudiant->delete();
        return['message'=>'user created'];
    }
}
