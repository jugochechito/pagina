@extends('adminlte::page')

@section('title', 'Agregar Noticia')

@section('content_header')
    <h1>Agregar Noticia</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="subtitle">Subtítulo</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" required>
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="content">Contenido</label>
                    <textarea class="form-control" id="content" name="content" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Imagen</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary">Agregar Noticia</button>
            </form>
        </div>
    </div>
@stop
