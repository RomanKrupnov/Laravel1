<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->getData());
        factory(User::class,10)->create();
    }

    public function getData(): array
    {

        return
            [
                'name' => 'admin',
                'email' => 'admin@admin.ru',
                'email_verified_at' => now(),
                'password' => '$2y$10$KrQGDC0M7ytccV9tfiurOeh5bw1V3L0CGKOdPH/mRYOv9GLQ3RAb6',
                'remember_token' => Str::random(10),
                'role' => '1',
            ];
    }
}
