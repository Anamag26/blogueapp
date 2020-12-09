<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = categorias::all();
        return view('categorias.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');

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
            'categorianome' => 'required|min:3|max:255',
        ]);

        //garvar imformação na BD
        $categorias= new Categorias;
        $categorias->categorianome=$data['categorianome'];
        $categorias->save();
        //preparar mensagem de feedback
        return redirect('/categorias/create')->with('status', 'categoria criada com sucesso');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias= Categorias::findOrfail($id);
        return view('categorias.edit',compact('categorias'));
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
        //validação
        $data = $request->validate([
            'categorianome' => 'required|min:3|max:255',
        ]);
         Categorias::where('id',$id)->update([
            'categorianome' => $data ['categorianome']
        ]);
        //garvar imformação na BD

        //preparar mensagem de feedback
        return redirect(route('categorias.edit',$id))->with('status', 'categoria alterada com sucesso');
        //Ridirecionar para o index das categorias com mensagem
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categorias::where('id',$id)->delete();
        return redirect(route('categorias.index',$id))->with('status', 'categoria eliminada com sucesso');
    }
}
