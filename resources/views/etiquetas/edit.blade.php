@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Editar Etiquetas') }}

                </div>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <div class="card-body">
                    <form action="{{route('etiquetas.update',$etiquetas->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                           <label for="etiquetas">Nome da Etiqueta</label>
                           <input type="text" class="form-control" id="etiquetas"
                           name="etiquetas" value ="{{$etiquetas->etiquetas}}"required>

                           @error('etiquetas')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror

                        </div>
                        <button type="submit" class="btn btn-primary">Gravar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
