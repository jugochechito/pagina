@extends('adminlte::page')

@section('title', 'Carousel Images')

@section('content_header')
    <h1>Carousel Images</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('carousel.create') }}" class="btn btn-primary mb-3">Add New Image</a>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($images as $image)
                        <tr>
                            <td><img src="{{ asset('storage/' . $image->image_path) }}" width="100"></td>
                            <td>
                                <form action="{{ route('carousel.destroy', $image->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
