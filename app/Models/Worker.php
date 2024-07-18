<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dni',
        'phone',
    ];

    //Relacion muchos a muchos, un colaborador puede estar asignado a mas de una sucursal
    public function stores(){
        return $this->belongsToMany('App\Models\Store')
                    ->withPivot('distance');
    }

    //Relacion con viajes, un colaborador realiza un viaje
    public function ride(){
        return $this->belongsTo('App\Models\Ride');
    }
}
