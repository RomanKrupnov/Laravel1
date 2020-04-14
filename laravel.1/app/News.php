<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'text', 'isPrivate', 'image', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->first();
    }

    public static function rules()
    {
        $tableNameCategory = (new Category())->getTable();
        return [
            'title' => 'required|min:3|max:200',
            'text' => 'required|min:20',
            'category_id' => "required|exists:{$tableNameCategory},id",
            'image' => 'mimes:jpeg,bmp,gif,png|max:2000',
            'isPrivate[]' => ['required|in_array:[0, 1]']
        ];
    }

    public static function attributeNames()
    {
        return [
            'title'=>'заголовок новости',
            'text'=>'текст новости',
            'category_id'=>'категория новости',
            'image'=>'картинка к новости',
            'isPrivate'=>'приватность новости'
        ];
    }
}
