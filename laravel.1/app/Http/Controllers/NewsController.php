<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
class NewsController extends Controller
{
    public function index(){
        return view('news.index')->with('news',News::getNews());
    }
    public function indexOne($id){
        return view('news.one')->with('news',News::getNewsId($id));
    }
    public function indexCategory($id){
        return view('news.categoryOne')->with('news',News::getNewsCategoryId($id));
    }
}
