<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locatario extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'city',
        'state',
        'phone',
    ];
}
