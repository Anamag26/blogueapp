<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'intro',
        'corpo',
        'imagem',
        'textolink',
        'link',
        'user_id',
        'categoria_id',

    ];

    public function comentario()
    {
        return $this->hasMany('App\Models\comentarios');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Models\categorias');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
