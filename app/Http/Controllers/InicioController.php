<?php

namespace App\Http\Controllers;
use App\Models\post;
use App\Models\categorias;

use Illuminate\Http\Request;
use App\Models\etiquetas;

class InicioController extends Controller
{
    public function index(){
        $post= post::all();
        $categorias= categorias::orderby('categorianome')->get();
        $etiquetas = etiquetas::orderby('etiquetas');
        $lasts= post::orderBy('id','desc')->take(3)->get();
        return view ('inicio', compact('post', 'lasts', 'categorias', 'etiquetas'));
    }
    
}
