<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function addNews(Request $request){
        if($request->isMethod('post')){

            $newsData = \Illuminate\Support\Facades\File::get(base_path() .'/storage/jsonNews.txt');
            $newsData = json_decode($newsData, true);
            $next_id = end($newsData);
            $next_id = $next_id['id']+1;
            $inputData = $request->except(['_token']);
            $inputData['id'] = $next_id;
            array_push($newsData, $inputData);
            \Illuminate\Support\Facades\File::put(base_path() .'/storage/jsonNews.txt',
                json_encode($newsData, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
            return redirect()->route('news.index');
        }
        return view('admin.addNews')->with(
            'category', Category::getCategory());


    }

   /* public function addNews(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->flashOnly('id', 'title', 'text', 'category', 'isPrivate');

            //file_put_contents('..\storage\jsonNews.txt');
            return redirect()->route('admin.addNews');
        }
        return view('admin.addNews')->with(
            'category', Category::getCategory());

    }*/

    public function deleteNews()
    {
        return view('admin.deleteNews');
    }
}
