@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Lista de Categorias') }}
                    <a href="{{route("categorias.create")}}" class="btn btn-success btn-sm ">Criar nova</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <ul class="list-group">
                    @forelse ($categorias as $categoria)
                        <li class="list-group-item">
                            {{$categoria->categorianome}} | Criado a {{$categoria->created_at}} |
                            <a href="{{route("categorias.edit",$categoria->id)}}" class="btn btn-sm btn-primary">Editar</a> |
                            <form action="{{route('categorias.destroy',$categoria->id)}}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Apaga</button>
                            </form>
                        </li>
                    @empty
                    <li class="list-item">
                        ainda sem categorias
                    </li>
                    @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
