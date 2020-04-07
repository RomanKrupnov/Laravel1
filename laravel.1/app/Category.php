<?php

namespace App;

use App\News;
use Illuminate\Support\Facades\File;

class Category
{
    private static $category;

    public static function getCategory()
    {
        static::$category = json_decode(File::get(base_path() .'/storage/jsonCategory.txt'), true);

        return static::$category;
    }

    public static function getCategoryId($id)
    {
        static::$category = json_decode(File::get(base_path() .'/storage/jsonCategory.txt'), true);
        return array_key_exists($id, static::$category) ? static::$category[$id] : null;
    }

    public static function getCategoryIdBySlug($slug)
    {
        static::$category = json_decode(File::get(base_path() .'/storage/jsonCategory.txt'), true);
        $id = null;
        foreach (static::$category as $categories) {
            if ($categories['slug'] == $slug) {
                $id = $categories['id'];
                break;
            }
        }
        return $id;
    }

    public static function getCategoryName($slug)
    {
        static::$category = json_decode(File::get(base_path() .'/storage/jsonCategory.txt'), true);
        array_key_exists($slug, static::$category) ? static::$category[$slug] : null;
    }

}
