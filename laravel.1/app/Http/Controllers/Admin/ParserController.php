<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index()
    {
        $category= new Category();
        $resource = 'https://news.yandex.ru/sport.rss';
        preg_match('/(\/[a-z]+\.rss)/',$resource,$found);
        $slug = substr($found[0],1,-4);
        $xml = XmlParser::Load($resource);

        $data_category = $xml->parse(
            [
                'name'=>['uses'=>'channel.title'],
                'slug'=>$slug,
                'description'=>['uses'=>'channel.description'],
                'image'=>['uses'=>'channel.image.url']
            ]);
        $data_news = $xml->parse(
            [
                'news'=>['uses'=>'channel.item[title,link,guid,description,pubDate]']
            ]);

        $is_exists = $category::query()->where('slug',$data_category['slug'])->value('id');
        if(!$is_exists){
            $category->fill($data_category)->save();
        }
        $categoryId = $category::query()->where('slug',$data_category['slug'])->value('id');
        $news = array_map(function ($new) use ($categoryId){
            return array(
                'title'=>$new['title'],
                'text'=>$new['description'],
                'category_id'=>$categoryId
            );
        }, $data_news['news']);
        foreach ($news as $new){
            News::query()->insert($new);
        }
        return redirect()->route('admin.news.index')->with('success', 'Новости успешно добавлены!');
    }





}
