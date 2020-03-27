<?php

namespace App;

use App\News;
class Category
{
    private static $category = [
        1=>[
            'id' => 1,
            'title' => 'Спорт',
        ],
        2=>[
            'id' => 2,
            'title' => 'Экономика',
        ],
        3=>[
            'id' => 3,
            'title' => 'Политика',
        ],
        4=>[
            'id' => 4,
            'title' => 'Мировые новости',
        ],
    ];


    public static function getCategory() {
        return static::$category;
    }

    public static function getCategoryId($id) {
        return static::$category[$id];

    }

}
