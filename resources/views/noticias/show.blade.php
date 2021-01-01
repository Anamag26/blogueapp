@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    {{ __('ver Noticias') }}

                </div>

                <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card">
                    @if ($post->imagem == null)
                    <img src="{{asset('appimages/semimagem.png')}}" class="card-img-top" alt="{{$post->intro}}">
                   @else
                   <img src="{{asset('appimages/noticias/'.$post->imagem)}}" class="card-img-top" alt="{{$post->intro}}">
                    @endif
                    
                    <div class="card-body">
                        <h5 class="card-title">{{$post->titulo}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$post->intro}}</h6>
                        <p class="card-text">{{$post->corpo}}</p>
                        <a href="{{$post->link}}" class="btn btn-primary" target="blank">{{$post->textolink}}</a>                       
                        <p class="card-text">
                        <small class="text-muted">Criado por {{$post->user->name}} {{$post->created_at->diffForHumans()}}
                        <br>Última alteração {{$post->updated_at->diffForHumans()}}</small></p>

                      
                    </div>

                    <div class="card-footer">
                        <a href="{{route('noticias.index')}}" class="btn btn-primary">Voltar à Lista</a>
                        @if ($post->user_id ==Auth::user()->id)                            
                            <a href="{{route('noticias.edit',$post->id)}}" class="btn btn-warning">Editar</a>
                            <a href="#" class="btn btn-danger">Eliminar</a>                            
                        @endif}}
                        
                    </div>
                </div>

            </div>
        </div>
        </div>
    </div>
    
</div>
@endsection
