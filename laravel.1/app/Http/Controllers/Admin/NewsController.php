<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->paginate(3);
        return view('admin.index', ['news' => $news]);

    }

    public function store(Request $request)
    {
        $news = new News();
            $inputData = $request->except(['_token']);
            $url = null;
            if ($request->file('image')) {
                $path = Storage::putFile('public/images', $request->file('image'));
                $url = Storage::url($path);
                $inputData['image']= $url;
            }
            $this->validate($request, News::rules(),[],News::attributeNames());
            $result = $news->fill($inputData)->save();
            if ($result) {
                return redirect()->route('admin.news.index')->with('success', 'Новость успешно создана!');
            } else {
                $request->flash();
                return redirect()->route('admin.news.create')->with('error', 'Ошибка добавления новости!');
            }
    }
    public function create(News $news){
        return view('admin.addNews', [
        'category' => Category::query()->select(['id', 'category'])->get(),
        'news' => $news
    ]);
    }

    public function edit(Request $request, News $news)
    {
        return view('admin.addNews', [
            'news' => $news,
            'category' => Category::query()->select(['id', 'category'])->get()
        ]);
    }

    public function update(Request $request, News $news)
    {
            $inputData = $request->except(['_token']);
            $url = null;
            if ($request->file('image')) {
                $path = Storage::putFile('public/images', $request->file('image'));
                $url = Storage::url($path);
                $inputData['image']= $url;
            }
            $this->validate($request, News::rules(), [], News::attributeNames());
            $result = $news->fill($inputData)->save();
            if ($result) {
                return redirect()->route('admin.news.index')->with('success', 'Новость успешно изменена!');
            } else {
                $request->flash();
                return redirect()->route('admin.news.edit')->with('error', 'Ошибка изменения новости!');
        }
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость успешно удалена!');
    }
}
