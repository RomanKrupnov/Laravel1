<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = ['category', 'slug'];

    public function news()
    {
        return $this->hasMany(News::class, 'category_id');
    }

    public static function rules()
    {
        return [
            'category' => 'required|min:3|max:20',
            'slug' => 'required|min:3|max:20|alpha'
        ];
    }

    public static function attributeNames()
    {
        return [
            'category' => 'имя категории',
            'slug' => 'транскрипция категории'
        ];
    }

    public static function searchCategoryId($search)
    {
        $category = new Category();
        $slug = Str::slug(str_replace(' ', '', $search));
        $data_category = [
            'category' => $search,
            'slug' => $slug
        ];
        $is_exists = $category::query()->where('category', $search)->value('id');
        if (!$is_exists) {
            $category->fill($data_category)->save();
        }
        $categoryId = $category::query()->where('slug', $data_category['slug'])->value('id');
        return $categoryId;
    }
}
