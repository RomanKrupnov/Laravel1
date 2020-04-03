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
        $json = json_decode(file_get_contents('..\storage\jsonNews.txt'), true);
        static::$news = $json;
        return static::$news;
    }

    public static function getNewsId($id)
    {
        $json = json_decode(file_get_contents('..\storage\jsonNews.txt'), true);
        static::$news = $json;
        return array_key_exists($id, static::$news) ? static::$news[$id] : null;
    }

    public static function getNewsCategoryId($id)
    {
        $json = json_decode(file_get_contents('..\storage\jsonNews.txt'), true);
        static::$news = $json;
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
        $json = json_decode(file_get_contents('..\storage\jsonNews.txt'), true);
        static::$news = $json;
        $id = Category::getCategoryIdBySlug($slug);
        $newsResult = [];
        foreach (static::$news as $item)
            if ($item['category_id'] == $id) {
                $newsResult[] = $item;
            }
        return $newsResult;
    }


}
