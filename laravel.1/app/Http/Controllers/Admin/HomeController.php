<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function addNews(Request $request)
    {
        $category = DB::table('catalog')->get();

       if($request->isMethod('post')){
           $url=null;
           if($request->file('image')){
               $path = Storage::putFile('public/images', $request->file('image'));
               $url= Storage::url($path);
           }
           DB::table('news')->insert(
           [
               'title'=> $request->title,
               'text' => $request->text,
               'isPrivate' => $request->isPrivate,
               'image' => $url,
               'category_id' => $request->category_id
           ]);
        }
        return view('admin.addNews')->with('category', $category);
    }

    public function deleteNews()
    {
        return view('admin.deleteNews');
    }


    /*public function addNews(Request $request){
        if($request->isMethod('post')){
            $url=null;
            if($request->file('image')){
                $path = Storage::putFile('public/images', $request->file('image'));
                $url= Storage::url($path);
            }
            $data = News::getNews();

            $data[] = [
                'title' => $request->title,
                'category_id' => $request->category_id,
                'text' => $request->text,
                'image' => $url,
                'isPrivate' => $request->isPrivate
            ];
            $id = array_key_last($data);
            $data[$id]['id'] = $id;
            File::put(base_path() .'/storage/jsonNews.txt',
                json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK));
            return redirect()->route('news.index')->with('success', 'Новость успешно добавлена');
        }
        return view('admin.addNews')->with('category', Category::getCategory());
    }*/










}

