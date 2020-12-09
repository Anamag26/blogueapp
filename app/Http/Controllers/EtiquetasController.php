<?php

namespace App\Http\Controllers;


use App\Models\etiquetas;
use Illuminate\Http\Request;

class EtiquetasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etiquetas = etiquetas::all();
        return view('etiquetas.index',compact('etiquetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etiquetas.create');
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
            'etiquetas' => 'required|min:3|max:255',
        ]);

        //garvar imformação na BD
        $etiquetas= new etiquetas;
        $etiquetas->etiquetas=$data['etiquetas'];
        $etiquetas->save();
        //preparar mensagem de feedback
        return redirect('/etiquetas/create')->with('status', 'Etiqueta criada com sucesso');
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
        $etiquetas= etiquetas::findOrfail($id);
        return view('etiquetas.edit',compact('etiquetas'));
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
            'etiquetas' => 'required|min:3|max:255',
        ]);
        etiquetas::where('id',$id)->update([
            'etiquetas' => $data ['etiquetas']
        ]);
        //garvar imformação na BD

        //preparar mensagem de feedback
        return redirect(route('etiquetas.edit',$id))->with('status', 'Etiqueta alterada com sucesso');
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
        etiquetas::where('id',$id)->delete();
        return redirect(route('etiquetas.index',$id))->with('status', 'Etiquetas eliminada com sucesso');
    }
}
