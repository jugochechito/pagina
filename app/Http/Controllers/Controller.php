<?php



namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\CarouselImage;
use App\Models\News;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function showWelcome()
    {
        $carouselImages = CarouselImage::all();
        $news = News::all();
        $documents = Document::all();

        $pdfs = $documents->filter(function ($doc) {
            return $doc->file_type === 'application/pdf';
        });

        $words = $documents->filter(function ($doc) {
            return in_array($doc->file_type, [
                'application/msword', 
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
            ]);
        });

        $excels = $documents->filter(function ($doc) {
            return in_array($doc->file_type, [
                'application/vnd.ms-excel', 
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            ]);
        });

        return view('welcome', compact('carouselImages', 'news', 'pdfs', 'words', 'excels'));
    }

    public function showNews(News $news)
    {
        return view('news.show', compact('news'));
    }
}



