<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etiquetas extends Model
{
    use HasFactory;
    protected $fillable = [
        'etiqueta',

    ];
    public function post(){
        return $this->belongsToMany(post::class);
    }
}
