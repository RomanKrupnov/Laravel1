<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function index(){
        return view('category')->with('category',Category::getCategory());
    }
    public function indexOne($id){
        return view('categoryOne')->with('category',Category::getCategoryId($id))->with('news',News::getNewsCategoryId($id));
    }
}
