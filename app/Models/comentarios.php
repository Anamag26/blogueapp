<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comentarios extends Model
{
    use HasFactory;
    protected $fillable = [
        'comentario',
        'user_id',
        'post_id',
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\post');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
