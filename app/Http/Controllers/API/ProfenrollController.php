<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Profenroll;
use DB;

class ProfenrollController extends Controller
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
        return Profenroll::all();
    }
    public function show($id)
    {
        if(strpos($id,'f')!== false){
            $id=explode('f',$id);
            $id[0]=(int)$id[0];
            $profEmp=DB::select('select * from profenrolls where filiere_id = :id', ['id' => $id[0]]);
        }
        else{
            $id=explode('p',$id);
            $id[0]=(int)$id[0];
            $profEmp=DB::select('select * from profenrolls where prof_id = :id', ['id' => $id[0]]);
        }
        return $profEmp;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      /*  $emploexist = DB::table('profenrolls')
       /* ->select('day')
      /*  ->where('prof_id', '=', $request['prof_id'] ,'and', 'day','=', $request['day'])
       /* ->get();         if(count($emploexist)==0 ){

*/

        $this->validate($request,[
            'day' => 'required',
            'prof_id' => 'required',
            'matiere_id' => 'required',
            'filiere_id' => 'required',

        ]);
        return Profenroll::create([
        'day'=>$request['day'],
        'prof_id'=>$request['prof_id'],
        'matiere_id'=>$request['matiere_id'],
        'filiere_id'=>$request['filiere_id'],

        ]);


    }
    public function destroy($id_enroll)
    {
        $Profenroll=Profenroll::findOrFail($id_enroll);
        $Profenroll->delete();
        return['message'=>'user created'];
    }

    }



