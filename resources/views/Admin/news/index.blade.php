@extends('adminlte::page')

@section('title', 'Noticias')

@section('content_header')
    <h1>Noticias</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('news.create') }}" class="btn btn-primary mb-3">Agregar Nueva Noticia</a>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Título</th>
                        <th>Subtítulo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $newsItem)
                        <tr>
                            <td><img src="{{ asset('storage/' . $newsItem->image_path) }}" width="100"></td>
                            <td>{{ $newsItem->title }}</td>
                            <td>{{ $newsItem->subtitle }}</td>
                            <td>
                                <a href="{{ route('news.edit', $newsItem->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
