<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorianome',

    ];
    public function post()
    {
        return $this->hasMany('App\Models\post');
    }
}
