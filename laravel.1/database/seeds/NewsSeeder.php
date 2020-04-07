<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Faker\Factory::create('ru_RU');

        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->realText(rand(20, 30)),
                'text' => $faker->realText(rand(120, 200)),
                'category_id' => rand(1, 10),
                'isPrivate' => (bool)rand(0,1)
            ];
        }
        return $data;
    }
}
