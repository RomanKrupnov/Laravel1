<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view ('admin.index');
    }
    public function addNews(Request $request){
        if($request->isMethod('post')){
            dd($request);
        }
        return view ('admin.addNews')->with(
            'category',Category::getCategory());

    }
    public function deleteNews(){
        return view ('admin.deleteNews');
    }
}
