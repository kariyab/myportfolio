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
            'name' => '一助',
            'lang' => 'php',
            'body' => '111',
        ]);

        \App\Bbs::create([
            'id' => '2',
            'name' => '二太郎',
            'lang' => 'ruby',
            'body' => '222',
        ]);
        
        \App\Bbs::create([
            'id' => '3',
            'name' => '三太',
            'lang' => 'PHP',
            'body' => '333',
        ]);
        
        \App\Bbs::create([
            'id' => '4',
            'name' => '四郎',
            'lang' => 'PHP',
            'body' => '444',
        ]);
        
        \App\Bbs::create([
            'id' => '5',
            'name' => '五助',
            'lang' => 'Ruby',
            'body' => '555',
        ]);
    }
}
