<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tutor';

    public function alumnos(){
        return $this->belongsToMany('App\Models\Alumno');
    }
}
