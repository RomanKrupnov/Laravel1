<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $fillable=['category','slug'];
   public function news(){
       return $this->hasMany(News::class,'category_id');
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
            'category'=>'имя категории',
            'slug'=>'транскрипция категории'
        ];
    }
}
