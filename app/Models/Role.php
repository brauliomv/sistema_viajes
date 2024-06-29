<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    //Relacion con usuario, un rol puede estar presente en varios usuarios
    public function users(){
        return $this->hasMany('App\Models\User');
    }
}
