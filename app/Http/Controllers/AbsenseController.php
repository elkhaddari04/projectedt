<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Absenc;
use DB;

class AbsenseController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function index(Request $request)
    {
        return view('home');
    }

    public function store()
    {
        $user=Auth::User();
        return [$user];
    }



    public function savedata(Request $request )
    {
        foreach( $request['absenselist'] as  $req ){


            Absenc::create([
                'id_etudiant'=>$req,
                'id_matiere'=>$request['id_matiere'],
                'day'=>$request['day'],
                'time'=>$request['time'],
                'month'=>$request['month']

            ]);

        }
        return ['massge'];
    }

}
