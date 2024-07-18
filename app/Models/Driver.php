<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'dni',
        'fee',
    ];

    //Un conductor realiza un viaje
    public function ride(){
        return $this->belongsTo('App\Models\Ride');
    }
}
