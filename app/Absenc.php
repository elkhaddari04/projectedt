<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absenc extends Model
{
    protected $fillable = [
        'absence_id',	'id_etudiant'	,'id_matiere'	,'day',	'time',	'month'
    ];
}
