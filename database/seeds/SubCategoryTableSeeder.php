<?php

use Illuminate\Database\Seeder;

class SubCategoryTableSeeder extends Seeder
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
        	'name' => 'cd',
        	'category_id' => 1
        	
        ];

        $p2 = [
        	'name' => 'dvd/bluray',
        	'category_id' => 1
        	
        ];
        $p3 = [
            'name' => 'photobook',
            'category_id' => 1
            
        ];

        $p4 = [
        	'name' => 'cd',
        	'category_id' => 2
        	
        ];

        $p5 = [
        	'name' => 'dvd/bluray',
        	'category_id' => 2
        	
        ];
        $p6 = [
            'name' => 'photobook',
            'category_id' => 2
            
        ];

        $p7 = [
        	'name' => 'cd',
        	'category_id' => 3
        	
        ];

        $p8 = [
        	'name' => 'dvd/bluray',
        	'category_id' => 3
        	
        ];
        

        App\SubCategory::create($p1);
        App\SubCategory::create($p2);
        App\SubCategory::create($p3);
        App\SubCategory::create($p4);
        App\SubCategory::create($p5);
        App\SubCategory::create($p6);
        App\SubCategory::create($p7);
        App\SubCategory::create($p8);
    }
}
