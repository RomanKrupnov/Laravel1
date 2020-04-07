<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function index(){
        $category = DB::table('catalog')->get();
        return view('news.category')->with('category',$category);
    }
    public function indexOne($id){
        $category = DB::table('catalog')->get();
        return view('news.categoryOne','category',$category);
        /*return view('news.categoryOne', [
            'category' => Category::getCategoryId($id),
            'news' => News::getNewsCategoryId($id)
        ]);*/
    }

    public function show($slug){
        //SELECT * FROM `news` WHERE `category_id` = (SELECT `id` FROM `catalog` WHERE `slug`='politic')
      // $cat = DB::table('catalog')->select('id')->where('slug','=',$slug);
        $news = DB::table('news')->where('category_id','=', '1')->get();

   return view('news.categoryOne')->with('news',$news);

    }
    /*public function show($slug){
   return view('news.categoryOne')->
        with('news',News::getNewsByCategorySlug($slug))->
        with('category',Category::getCategoryName($slug));

    }*/
}
