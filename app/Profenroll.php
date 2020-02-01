<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profenroll extends Model
{
    protected $fillable = [
       	'day'	,'start',	'end',	'prof_id'	,'matiere_id','filiere_id'

    ];

    public $timestamps = false;

}
