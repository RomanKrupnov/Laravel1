<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->where('id', '<>', 0)->paginate(3);
        return view('admin.index', ['news' => $news]);

    }

    public function create(Request $request)
    {
        $news = new News();

        if ($request->isMethod('post')) {
            $url = null;
            if ($request->file('image')) {
                $path = Storage::putFile('public/images', $request->file('image'));
                $url = Storage::url($path);
            }
            $news->fill($request->all())->save();
            return redirect()->route('admin.index')->with('success', 'Новость успешно создана!');
        }

        return view('admin.addNews', [
            'category' => Category::query()->select(['id', 'title'])->get(),
            'news' => $news
        ]);
    }

    public function edit(Request $request, News $news)
    {
        return view('admin.addNews', [
            'news' => $news,
            'category' => Category::query()->select(['id', 'title'])->get()
        ]);
    }

    public function update(Request $request, News $news)
    {
        if ($request->isMethod('post')) {
            if ($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
                $news->image = $url;
            }
            $news->fill($request->all());
            $news->save();
            return redirect()->route('admin.index')->with('success', 'Новость успешно изменена!');
        }
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.index')->with('success', 'Новость успешно удалена');

    }
}
