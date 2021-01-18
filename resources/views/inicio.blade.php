@extends('layouts.base')
@section('content')

<main id="main">

  @include('tempoparts.breadcrumbs')

  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container">

      <div class="row">

        <div class="col-lg-8 entries">
          <div class="row">
            @foreach ($post as $posts)
            <div class="col-md-6 d-flex align-items-stretch">          
                         
              <article class="entry">

                <div class="entry-img">
                  @if ($posts->imagem==null)
                    <img src="{{asset('appimages/semimagem.png')}}" alt="{{$posts->intro}}"
                    class="img-fluid">
                  @else 
                    <img src="{{asset('appimages/noticias/'.$posts->imagem)}}" alt="{{$posts->intro}}" 
                    class="img-fluid">
                  @endif
                </div>

                <h2 class="entry-title">
                  <a href="blog-single.html">{{$posts->titulo}}</a>
                </h2>

                <div class="entry-meta">
                  <ul>
                    <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">{{$posts->user->name}}</a></li>
                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{$posts->created_at->diffForHumans()}}</time></a></li>
                  </ul>
                </div>

                <div class="entry-content">
                  <p>
                    {{$posts->corpo}}
                  </p>
                  <div class="read-more">
                    <a href="blog-single.html">Ler mais</a>
                  </div>
                </div>

              </article><!-- End blog entry -->
           </div>
           @endforeach        
          </div>

          <div class="blog-pagination">
            <ul class="justify-content-center">
              <li class="disabled"><i class="icofont-rounded-left"></i></li>
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
            </ul>
          </div>

        </div><!-- End blog entries list -->

        <div class="col-lg-4">

          <div class="sidebar">

            <h3 class="sidebar-title">Pesquisar</h3>
            <div class="sidebar-item search-form">
              <form action="">
                <input type="text">
                <button type="submit"><i class="icofont-search"></i></button>
              </form>

            </div><!-- End sidebar search formn-->

            <h3 class="sidebar-title">Categorias</h3>
            <div class="sidebar-item categories">
              @foreach ($categorias as $categoria)
                <ul>                
                <li><a href="#">{{$categoria->categorianome}}<span>(25)</span></a></li>
              </ul>  
              @endforeach
              

            </div><!-- End sidebar categories-->

            <h3 class="sidebar-title">Últimos Posts</h3>
            @foreach ($post as $posts)
              <div class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  @if ($posts->imagem==null)
                    <img src="{{asset('appimages/semimagem.png')}}" alt="{{$posts->intro}}"
                    class="img-fluid">
                  @else 
                    <img src="{{asset('appimages/noticias/'.$posts->imagem)}}" alt="{{$posts->intro}}" 
                    class="img-fluid">
                  @endif
                  <h4><a href="blog-single.html">{{$posts->titulo}}</a></h4>
                  <time datetime="2020-01-01">{{$posts->created_at->diffForHumans()}}</time>
                </div>
             </div>
            @endforeach
            

            <h3 class="sidebar-title">Etiquetas</h3>
            @foreach ($etiquetas as $etiquetas)
               <div class="sidebar-item tags">
              <ul>
                <li><a href="#">{{$etiquetas->$etiquetas}}</a></li>
                
              </ul>

            </div><!-- End sidebar tags--> 
            @endforeach
            

          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div>

    </div>
  </section><!-- End Blog Section -->

</main>
    
@endsection