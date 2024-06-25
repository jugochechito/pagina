@extends('adminlte::page')

@section('title', 'Documentos')

@section('content_header')
    <h1>Documentos</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('documents.create') }}" class="btn btn-primary mb-3">Subir Documento</a>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $document)
                        <tr>
                            <td>{{ $document->title }}</td>
                            <td>{{ $document->simple_type }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $document->file_path) }}" class="btn btn-primary" target="_blank">Ver Documento</a>
                                <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('documents.destroy', $document->id) }}" method="POST" style="display:inline-block;">
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
