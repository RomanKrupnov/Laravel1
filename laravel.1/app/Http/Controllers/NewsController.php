<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->where('id', '<>', 0)->paginate(3);
        return view('news.index')->with('news', $news);
    }

    public function show($id)
    {
        $news = News::query()->find($id);
        if (!empty($news)) {
            return view('news.show')->with('news', $news);
        } else return redirect()->route('news.index');
    }

}
