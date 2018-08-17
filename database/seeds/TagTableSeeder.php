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

        $p5 = [
            'tag' => 'yg',
            
        ];

        $p6 = [
            'tag' => 'blackpink',
            
        ];

        $p4 = [
        	'tag' => 'dvd',
        	
        ];

       

        App\Tag::create($p1);
        App\Tag::create($p2);
        App\Tag::create($p3);
        App\Tag::create($p4);
        App\Tag::create($p5);
        App\Tag::create($p6);
        
    }
}
