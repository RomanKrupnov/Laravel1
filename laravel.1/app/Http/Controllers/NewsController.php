<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
class NewsController extends Controller
{
    public function index(){
        return view('news')->with('news',News::getNews());
    }
    public function indexOne($id){
        return view('newsOne')->with('news',News::getNewsId($id));
    }
    public function indexCategory($id){
        return view('categoryOne')->with('news',News::getNewsCategoryId($id));
    }
}
