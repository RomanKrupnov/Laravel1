<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function index(){
        $category = Category::query()->where('id', '<>', 0)->paginate(3);
        return view('news.category')->with('category',$category);
    }

    public function show($slug){
        $category = Category::query()->select(['id', 'category'])->where('slug', $slug)->get();
        $news = News::query()
            ->where('category_id', $category[0]->id)->paginate(3);

   return view('news.categoryOne')->with('news',$news)->with('category',$category);

    }
}
