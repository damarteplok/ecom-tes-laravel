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
        	'name' => 'man',
        	
        ];

        $p2 = [
        	'name' => 'woman',
        	
        ];

        App\Category::create($p1);
        App\Category::create($p2);
    }
}
