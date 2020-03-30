<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function index(){
        return view('news.category')->with('category',Category::getCategory());
    }
    public function indexOne($id){
        return view('news.categoryOne', [
            'category' => Category::getCategoryId($id),
            'news' => News::getNewsCategoryId($id)
        ]);
    }

    public function show($slug){
        return view('news.categoryOne')->
        with('news',News::getNewsByCategorySlug($slug))->
        with('category',Category::getCategoryName($slug));

    }
}
