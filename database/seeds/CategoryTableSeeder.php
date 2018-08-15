<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $p1 = [
        	'name' => 'K-Pop',
        	
        ];

        $p2 = [
        	'name' => 'J-Pop',
        	
        ];
        $p3 = [
            'name' => 'Indonesia',
            
        ];

        App\Category::create($p1);
        App\Category::create($p2);
        App\Category::create($p3);
    }
}
