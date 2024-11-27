<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imobiliaria extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'city',
        'state',
        'responsible',
    ];
}
