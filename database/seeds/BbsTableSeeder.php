<?php

use Illuminate\Database\Seeder;

class BbsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Bbs::create([
            'id' => '1',
            'title' => 'テスト1',
            'body' => '111',
        ]);

        \App\Bbs::create([
            'id' => '2',
            'title' => 'テスト2',
            'body' => '222',
        ]);
        
        \App\Bbs::create([
            'id' => '3',
            'title' => 'テスト3',
            'body' => '333',
        ]);
        
        \App\Bbs::create([
            'id' => '4',
            'title' => 'テスト4',
            'body' => '444',
        ]);
        
        \App\Bbs::create([
            'id' => '5',
            'title' => 'テスト5',
            'body' => '555',
        ]);
    }
}
