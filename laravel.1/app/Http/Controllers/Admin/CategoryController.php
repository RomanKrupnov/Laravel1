<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function cindex()
    {
        $category = Category::query()->paginate(3);
        return view('admin.categoryIndex', ['category' => $category]);
    }

    public function create(Request $request)
    {
        $category = new Category();

        if ($request->isMethod('post')) {
            $data = $this->validate($request, Category::rules(),[],Category::attributeNames());
            $result = $category->fill($data)->save();
            if ($result) {
                return redirect()->route('admin.cindex')->with('success', 'Категория успешно создана!');
            } else {
                $request->flash();
                return redirect()->route('admin.addCategory')->with('error', 'Ошибка добавления категории!');
            }
        }
            return view('admin.addCategory', [
                'category' => Category::query()->select(['category','slug'])->get()]);
        }
    public function edit(Request $request, Category $category) {
        return view('admin.editCategory', [
            'category' => $category

        ]);
    }
    public function update(Request $request, Category $category) {
        if ($request->isMethod('post')) {
            $data = $this->validate($request, Category::rules(),[],Category::attributeNames());
            $result = $category->fill($data)->save();
            if ($result) {
                return redirect()->route('admin.cindex')->with('success', 'Категория успешно обновлена!');
            } else {
                $request->flash();
                return redirect()->route('admin.editCategory')->with('error', 'Ошибка обновления категории!');
            }
        }
    }
    public function destroy(Category $category) {
        $category->delete();
        return redirect()->route('admin.cindex')->with('success', 'Новость успешно удалена!');
    }

}
