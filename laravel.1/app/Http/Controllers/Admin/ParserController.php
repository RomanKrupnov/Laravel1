<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index()
    {
        $news = new News();
        $xml = XmlParser::load('https://news.yandex.ru/auto.rss');
        $data = $xml->parse([
            'title'=>['uses'=> 'channel.title'],
            'link'=>['uses' => 'channel.link'],
            'description' => ['uses'=>'channel.description'],
            'image'=> ['uses'=> 'channel.image.url'],
            'news' => ['uses'=> 'channel.item[title,link]']
        ]);
        //dd($data);
        //foreach ($data as $item){
              //  var_dump($item[array([title])]);



            //$news->['title'] => $data['news[title]'];
            //dd($news);
         //$news->fill($data['news'])->save();

    }
}
