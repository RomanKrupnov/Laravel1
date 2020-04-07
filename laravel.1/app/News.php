<?php

namespace App;

use App\Category;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Static_;
use Illuminate\Http\UploadedFile;

class News
{
    private static $news;

    public static function getNews()
    {
        static::$news = json_decode(File::get(base_path() .'/storage/jsonNews.txt'), true);
        return static::$news;
    }

    public static function getNewsId($id)
    {
        static::$news = json_decode(File::get(base_path() .'/storage/jsonNews.txt'), true);
        return array_key_exists($id, static::$news) ? static::$news[$id] : null;
    }

    public static function getNewsCategoryId($id)
    {
        static::$news = json_decode(File::get(base_path() .'/storage/jsonNews.txt'), true);
        $newsResult = [];
        foreach (static::$news as $new) {
            if ($new['category_id'] == $id) {
                $newsResult[] = $new;
            }
        }
        return $newsResult;
    }

    public static function getNewsByCategorySlug($slug)
    {
        static::$news = json_decode(File::get(base_path() .'/storage/jsonNews.txt'), true);
        $id = Category::getCategoryIdBySlug($slug);
        $newsResult = [];
        foreach (static::$news as $item)
            if ($item['category_id'] == $id) {
                $newsResult[] = $item;
            }
        return $newsResult;
    }


}
