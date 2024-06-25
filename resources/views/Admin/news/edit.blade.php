@extends('adminlte::page')

@section('title', 'Editar Noticia')

@section('content_header')
    <h1>Editar Noticia</h1>
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
            <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}" required>
                </div>
                <div class="form-group">
                    <label for="subtitle">Subtítulo</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $news->subtitle }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" id="description" name="description" required>{{ $news->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="content">Contenido</label>
                    <textarea class="form-control" id="content" name="content" required>{{ $news->content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Imagen</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Noticia</button>
            </form>
        </div>
    </div>
@stop
