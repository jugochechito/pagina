<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
        return view('admin.documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|file|mimes:pdf,xlsx,xls,doc,docx|max:20480',
        ]);

        $filePath = $request->file('file')->store('documents', 'public');
        $fileType = $request->file('file')->getClientMimeType();

        Document::create([
            'title' => $request->title,
            'file_path' => $filePath,
            'file_type' => $fileType,
        ]);

        return redirect()->route('documents.index')->with('success', 'Documento subido con éxito.');
    }

    public function edit(Document $document)
    {
        return view('admin.documents.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'nullable|file|mimes:pdf,xlsx,xls,doc,docx|max:20480',
        ]);

        if ($request->hasFile('file')) {
            // Eliminar el archivo antiguo del sistema de archivos si existe
            if (Storage::disk('public')->exists($document->file_path)) {
                Storage::disk('public')->delete($document->file_path);
            }

            // Almacenar el nuevo archivo
            $filePath = $request->file('file')->store('documents', 'public');
            $fileType = $request->file('file')->getClientMimeType();
            $document->file_path = $filePath;
            $document->file_type = $fileType;
        }

        $document->title = $request->title;
        $document->save();

        return redirect()->route('documents.index')->with('success', 'Documento actualizado con éxito.');
    }

    public function destroy(Document $document)
    {
        // Eliminar el archivo del sistema de archivos si existe
        if (Storage::disk('public')->exists($document->file_path)) {
            Storage::disk('public')->delete($document->file_path);
        }

        // Eliminar la entrada de la base de datos
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Documento eliminado con éxito.');
    }
}
