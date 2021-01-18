@extends('layouts.app')

@section('content') 
    <div class="container"> 
        <div class="row justify-content-center">
            <div class="col-md-8">
               <h3>Lista de publicações</h3>
            @forelse ($post as $posts) 
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            @if ($posts->imagem==null)
                                <img src="{{asset('appimages/semimagem.png')}}" alt="{{$posts->intro}}"
                                class="img-fluid">
                            @else 
                                <img src="{{asset('appimages/noticias/'.$posts->imagem)}}" alt="{{$posts->intro}}" 
                                class="img-fluid">
                            @endif
                        </div> 
                        
                        @foreach ($posts->etiquetas as $etiqueta)
                            <span class="badge badge-success">{{$etiquetas->etiqueta}}</span>
                        @endforeach

                        <div class="col-md-8"> 
                            <div class="card-body">
                                <h5 class="card-title">{{$posts->titulo}}</h5>
                                 <p class="card-text"><span class="badge ">{{ $posts->categoria->categorianome}}</span>
                                </p> <p class="card-text">{{$posts->intro}}</p> 
                                <a href="{{$posts->link}}" class="btn btn-primary" target="blank">{{$posts->textolink}}</a> 
                                <a href="{{route('noticias.show',$posts->id)}}" class="btn btn-primary">Ver Mais</a> 
                                <p class="card-text text-right">
                                    <small class="text-muted">Criado por {{$posts->user->name}} {{$posts->created_at->diffForHumans()}}
                                        <br>Última alteração {{$posts->updated_at->diffForHumans()}}</small></p>

                                
                            </div>
                        </div>
                    </div> 
                </div>
            @empty 
            <p>Ainda sem publicações</p> 
            @endforelse
          </div>
     </div>
 </div>
 @endsection
