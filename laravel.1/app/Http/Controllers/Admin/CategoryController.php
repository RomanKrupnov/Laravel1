<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::query()->paginate(5);
        return view('admin.categoryIndex', ['category' => $category]);
    }

    public function create(Category $category)
    {
        return view('admin.addCategory', [
            'category' => Category::query()->select(['category', 'slug'])->get()]);
    }

    public function store(Request $request)
    {
        $category = new Category();
        $data = $this->validate($request, Category::rules(), [], Category::attributeNames());
        $result = $category->fill($data)->save();
        if ($result) {
            return redirect()->route('admin.category.index')->with('success', 'Категория успешно создана!');
        } else {
            $request->flash();
            return redirect()->route('admin.category.create')->with('error', 'Ошибка добавления категории!');
        }
    }

    public function edit(Request $request, Category $category)
    {
        return view('admin.editCategory', [
            'category' => $category

        ]);
    }

    public function update(Request $request, Category $category)
    {
        $data = $this->validate($request, Category::rules(), [], Category::attributeNames());
        $result = $category->fill($data)->save();
        if ($result) {
            return redirect()->route('admin.category.index')->with('success', 'Категория успешно обновлена!');
        } else {
            $request->flash();
            return redirect()->route('admin.category.edit')->with('error', 'Ошибка обновления категории!');
        }

    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Новость успешно удалена!');
    }


}
