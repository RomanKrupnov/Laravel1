<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }
    private function getData(): array
    {
        $faker = Faker\Factory::create('ru_RU');

        $data = [
            [
                'category' => 'Политика',
                'slug'=> 'politic'
            ],
            [
                'category' => 'Мировая политика',
                'slug'=> 'worldPolitic'
            ],
            [
                'category' => 'Экономика',
                'slug'=> 'economic'
            ],
            [
                'category' => 'Банки',
                'slug'=> 'banks'
            ],
            [
                'category' => 'Региональные новости',
                'slug'=> 'region'
            ],
            [
                'category' => 'Валюты',
                'slug'=> 'currency'
            ],
            [
                'category' => 'Спорт',
                'slug'=> 'sport'
            ],
            [
                'category' => 'Медицина',
                'slug'=> 'medical'
            ],
            [
                'category' => 'Армия',
                'slug'=> 'army'
            ],
            [
                'category' => 'Погода',
                'slug'=> 'weather'
            ]

        ];
        return $data;
    }
}
