@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Articulo</div>

                <div class="card-body"  class="grid gap-0 row-gap-3">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <form 
                        action="{{route('posts.store')}}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        <div class="form-group mb-3 row">
                            <label>Titulo *</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="form-group mb-3 row">
                            <label>Imagen</label>
                            <input type="file" name="file" >
                        </div>

                        <div class="form-group mb-3 row">
                            <label>Contenido *</label>
                            <textarea name="body" rows="6" class="form-control"required></textarea>
                        </div>

                        <div class="form-group mb-3 row">
                            <label>Contenido Embebido</label>
                            <textarea name="iframe" class="form-control"></textarea>
                        </div>

                        <div class="form-group mb-3 row">
                            @csrf
                            <input type="submit" value="Enviar" class="btn btn-primary btn-sm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
