<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarouselImage;
use Illuminate\Http\Request;

class CarouselImageController extends Controller
{
    public function index()
    {
        $images = CarouselImage::all();
        return view('admin.carousel.index', compact('images'));
    }

    public function create()
    {
        return view('admin.carousel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);

        $imagePath = $request->file('image')->store('carousel', 'public');

        CarouselImage::create(['image_path' => $imagePath]);

        return redirect()->route('carousel.index')->with('success', 'Imagen agregada al carrusel.');
    }

    public function destroy(CarouselImage $carouselImage)
    {
        $carouselImage->delete();
        return redirect()->route('carousel.index')->with('success', 'Imagen eliminada del carrusel.');
    }
}

