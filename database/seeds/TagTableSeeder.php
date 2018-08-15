<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $p1 = [
        	'tag' => 'New Release',
        	
        ];

        $p2 = [
        	'tag' => 'jyp',
        	
        ];

        $p3 = [
        	'tag' => 'twice',
        	
        ];

        $p4 = [
        	'tag' => 'dvd',
        	
        ];

       

        App\Tag::create($p1);
        App\Tag::create($p2);
        App\Tag::create($p3);
        App\Tag::create($p4);
        
    }
}
