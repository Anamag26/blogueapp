<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\etiquetas;
use App\Models\categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = post::all();
        $etiquetas= etiquetas::orderby('etiqueta');
        return view('noticias.index',compact('post','etiquetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias= categorias::orderby('categorianome')->get();
        $etiquetas= etiquetas::orderby('etiqueta');
        return view('noticias.create',compact('categorias','etiquetas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validação
        $data = $request->validate([
            'titulo' => 'required|max:100|unique:posts',
            'intro' => 'required|max:255',
            'corpo' => 'required',
            'textolink' => 'max:255',
            'link' => 'url|min:3|max:255',
            'categoria' => 'required|gt:0',
            'etiqueta'=>'Exists:etiquetas,id',
            'imagem'=>'image|mimes:jpg,jpeg,png|max:5000',
        ]);

        //garvar imformação na BD
        $posts= new post;
        $posts->titulo=$data['titulo'];~
        $posts->intro=$data['intro'];
        $posts->corpo=$data['corpo'];
        $posts->textolink=$data['textolink'];
        $posts->link=$data['link'];
        $posts->user_id= Auth::user()->id;
        $posts->categoria_id=$data['categoria'];
        if($request->has('imagem')){
            $img=$request->file('imagem'); //pegar na imagem
            $imgnome= time() . '.' . $img->getClientOriginalExtension();// construir um nome para a imagem e ir buscar a extensão original que a imagem tinha
            $path = 'appimages/noticias/'; //local de armazenamento
            $img->move($path,$imgnome);//mover para o local
            $posts->imagem=$imgnome; //guardar na base de dados
        }
        $posts->save();

        $posts->etiquetas()->attach(request('etiquetas'));
        //preparar mensagem de feedback
        return redirect('/noticias')->with('status', 'Post criado com sucesso!');
        //Ridirecionar para o index das categorias com mensagem
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = post::findOrFail($id);
        return view('noticias.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::findOrFail($id);
        $categorias= categorias::orderby('categorianome')->get();
        return view('noticias.edit',compact('post','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'titulo' => 'required|max:100|unique:posts',
            'intro' => 'required|max:255',
            'corpo' => 'required',
            'textolink' => 'max:255',
            'link' => 'url|min:3|max:255',
            'categoria' => 'required|gt:0',
            'etiqueta'=>'Exists:etiquetas,id',
            'imagem'=>'image|mimes:jpg,jpeg,png|max:5000',
        ]);
        $posts= new post;
        $posts->titulo=$data['titulo'];~
        $posts->intro=$data['intro'];
        $posts->corpo=$data['corpo'];
        $posts->textolink=$data['textolink'];
        $posts->link=$data['link'];
        $posts->user_id= Auth::user()->id;
        $posts->categoria_id=$data['categoria'];
        if($request->has('imagem')){
            $img=$request->file('imagem'); //pegar na imagem
            $imgnome= time() . '.' . $img->getClientOriginalExtension();// construir um nome para a imagem e ir buscar a extensão original que a imagem tinha
            $path = 'appimages/noticias/'; //local de armazenamento
            $img->move($path,$imgnome);//mover para o local
            $posts->imagem=$imgnome; //guardar na base de dados
        }
        $posts->save();
        $posts->etiquetas()->sync(request('etiquetas'));
        return redirect('/noticias')->with('status', 'Post editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
