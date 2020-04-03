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

    public function addNews(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->flashOnly('id', 'title', 'text', 'category', 'isPrivate');

            //file_put_contents('..\storage\jsonNews.txt');
            return redirect()->route('admin.addNews');
        }
        return view('admin.addNews')->with(
            'category', Category::getCategory());

    }

    public function deleteNews()
    {
        return view('admin.deleteNews');
    }
}
