<?php

namespace App;

use App\News;
class Category
{
    private static $category = [
        1=>[
            'id' => 1,
            'title' => 'Спорт',
            'slug'=>'sport',
        ],
        2=>[
            'id' => 2,
            'title' => 'Экономика',
            'slug'=>'economic',
        ],
        3=>[
            'id' => 3,
            'title' => 'Политика',
            'slug'=>'politic',
        ],
        4=>[
            'id' => 4,
            'title' => 'Мировые новости',
            'slug'=>'world-news',
        ],
    ];


    public static function getCategory() {
        return static::$category;
    }

    public static function getCategoryId($id) {
    return array_key_exists($id, static::$category) ? static::$category[$id] : null;
    }
    public static function getCategoryIdBySlug($slug){
        $id = null;
        foreach (static::$category as $categories ){
            if($categories['slug'] == $slug){
                 $id = $categories['id'];
                break;
            }
        }
        return $id;
    }
    public static function getCategoryName($slug){
        array_key_exists($slug, static::$category) ? static::$category[$slug] : null;
    }

}
