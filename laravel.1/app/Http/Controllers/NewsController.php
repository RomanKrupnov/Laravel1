<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $news = DB::table('news')->get();
        return view('news.index')->with('news', $news);
        //return view('news.index')->with('news',News::getNews());
    }

    public function indexOne($id)
    {
        $news = DB::table('news')->find($id);
        if (!empty($news)) {
            return view('news.one')->with('news', $news);
        } else return redirect()->route('news.index');

        //return view('news.one')->with('news',News::getNewsId($id));
    }

    public function indexCategory($id)
    {
        return view('news.categoryOne')->with('news', News::getNewsCategoryId($id));
    }
}
