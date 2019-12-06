<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // オーナー
        \App\User::create([
            'name' => 'オーナー太郎',
            'email' => 'owner@example.com',
            'password' => bcrypt('otarou'),
            'role' => '1'
        ]);

        // お客さん
        \App\User::create([
            'name' => 'お客花子',
            'email' => 'customer@example.com',
            'password' => bcrypt('kyakuhana'),
            'role' => '10'
        ]);
        
        \App\User::create([
            'name' => 'ルーキー',
            'email' => 'ru-ki-@example.com',
            'password' => bcrypt('wakaranai'),
            'role' => '10'
        ]);
    }
}
