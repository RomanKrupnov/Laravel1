<?php


namespace App\Services;


use App\Category;
use App\News;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XMLParserService
{
    public function saveNews($link)
    {
        $xml = XmlParser::Load($link);
        $data_news = $xml->parse(
            [
                'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate,enclosure::url,category]']
            ]);
        foreach ($data_news['news'] as $key => $item) {
            $newNews = new News();
            if (!News::query()->where(['link' => $item['link']])->first()) {
                $newNews->title = $item['title'];
                $newNews->text = $item['description'];
                $newNews->created_at = (new Carbon($item['pubDate']))->format('Y-m-d H:i:s');
                $newNews->link = $item['link'];
                $newNews->image = $item['enclosure::url'];
                $newNews->category_id = Category::searchCategoryId($item['category']);
                $newNews->save();
            }
        }
        Storage::disk('local')->append('logParser.txt', date('c') . ' ' . $link);

    }

}
