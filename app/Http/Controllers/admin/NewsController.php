<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);

        $imagePath = $request->file('image')->store('news', 'public');

        News::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'content' => $request->content,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('news.index')->with('success', 'Noticia creada con éxito.');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news', 'public');
            $news->update(['image_path' => $imagePath]);
        }

        $news->update($request->only('title', 'subtitle', 'description', 'content'));

        return redirect()->route('news.index')->with('success', 'Noticia actualizada con éxito.');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('success', 'Noticia eliminada con éxito.');
    }
}

