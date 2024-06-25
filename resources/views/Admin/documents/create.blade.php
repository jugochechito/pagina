@extends('adminlte::page')

@section('title', 'Documentos')

@section('content_header')
    <h1>Subir Documentos</h1>
@stop

@section('content')
    <div class="container">
        <h1>Subir Documento</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="file">Archivo</label>
                <input type="file" class="form-control" id="file" name="file" required>
            </div>
            <button type="submit" class="btn btn-primary">Subir</button>
        </form>
    </div>
@endsection
