@extends('adminlte::page')

@section('title', 'Documentos')

@section('content_header')
    <h1>Editar Documento</h1>
@stop

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $document->title }}" required>
            </div>
            <div class="form-group">
                <label for="file">Archivo (opcional)</label>
                <input type="file" class="form-control" id="file" name="file">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
