<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Paciente extends Model
{
    use Notifiable;
    use SoftDeletes;



protected $fillable = [
        'name', 'email', 'password','start','sexo',
    ];

    protected $hidden = [
        'remember_token',
    ];
}

   /*public function scopeSearch($query, $name)
    {
        return $query->where('name', 'LIKE', "%$name%");
    }
    */
