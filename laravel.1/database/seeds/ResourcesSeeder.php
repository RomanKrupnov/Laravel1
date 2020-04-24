<?php

use Illuminate\Database\Seeder;

class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert($this->getData());
    }

    public function getData()
    {
        $faker = Faker\Factory::create('en_En');
        $data = [
            ['link'=>'http://lenta.ru/rss/news'],
            ['link'=>'https://lenta.ru/rss/articles'],
            ['link'=>'https://lenta.ru/rss/top7'],
            ['link'=>'https://lenta.ru/rss/news/russia']
        ];
        return $data;
    }
}
