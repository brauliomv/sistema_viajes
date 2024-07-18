<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory;

    protected $fillable = [
        'ride_id',
        'driver_id',
        'distance',
        'distance',
        'user_id',
    ];

    //En un viaje se trasladan varios colaboradores
    public function workers(){
        return $this->belongsToMany('App\Models\Worker');
    }

    //Un viaje es realizado por un conductor
    public function driver(){
        return $this->belongsTo('App\Models\Driver');
    }

    //Un viaje es registrado por un usuario
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
