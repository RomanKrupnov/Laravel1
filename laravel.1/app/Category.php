<?php

namespace App;

use App\News;

class Category
{
    private static $category;

    public static function getCategory()
    {
        $json2 = json_decode(file_get_contents('..\storage\jsonCategory.txt'), true);
        static::$category = $json2;
        return static::$category;
    }

    public static function getCategoryId($id)
    {
        $json2 = json_decode(file_get_contents('..\storage\jsonCategory.txt'), true);
        static::$category = $json2;
        return array_key_exists($id, static::$category) ? static::$category[$id] : null;
    }

    public static function getCategoryIdBySlug($slug)
    {
        $json2 = json_decode(file_get_contents('..\storage\jsonCategory.txt'), true);
        static::$category = $json2;
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
        $json2 = json_decode(file_get_contents('..\storage\jsonCategory.txt'), true);
        static::$category = $json2;
        array_key_exists($slug, static::$category) ? static::$category[$slug] : null;
    }

}
