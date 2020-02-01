<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Matiere;


class MatiereController extends Controller
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
        return Matiere::latest()->paginate(5);

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

        ]);


        return Matiere::create([
            'name_matiere'=>$request['name_matiere'],
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_matiere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_matiere)
    {
        $Matiere=Matiere::findOrFail($id_matiere);
        $this->validate($request,[

        ]);

        $Matiere->update($request->all());
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
        $Matiere=Matiere::findOrFail($id);
        $Matiere->delete();
        return['message'=>'user created'];
    }
}
