<?php

use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catalog')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Faker\Factory::create('ru_RU');

        $data = [
            [
                'title' => 'Политика',
                'slug'=> 'politic'
            ],
            [
                'title' => 'Мировая ролитика',
                'slug'=> 'worldPolitic'
            ],
            [
                'title' => 'Экономика',
                'slug'=> 'economic'
            ],
            [
                'title' => 'Банки',
                'slug'=> 'banks'
            ],
            [
                'title' => 'Региональные новости',
                'slug'=> 'region'
            ],
            [
                'title' => 'Валюты',
                'slug'=> 'currency'
            ],
            [
                'title' => 'Спорт',
                'slug'=> 'sport'
            ],
            [
                'title' => 'Медицина',
                'slug'=> 'medical'
            ],
            [
                'title' => 'Армия',
                'slug'=> 'army'
            ],
            [
                'title' => 'Погода',
                'slug'=> 'weather'
            ]

        ];
        return $data;
    }
}
