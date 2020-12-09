@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="jumbotron">
                            <h1 class="display-4">Blogue</h1>
                            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                            <hr class="my-4">

                            <nav class="navbar navbar">
                                <a class="btn btn-primary btn-lg" href="#" role="button">Learn More</a>
                                <form class="form-inline">
                                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                </form>
                              </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
