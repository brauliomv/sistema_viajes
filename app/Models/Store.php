<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
    ];

    //Relacion muchos a muchos, una sucursal tiene varios colaboradores
    public function workers(){
        return $this->belongsToMany('App\Models\Worker')
                    ->withPivot('distance');
    }
}
