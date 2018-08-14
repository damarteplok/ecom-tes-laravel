<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $p1 = [
        // 	'name' => 'batik',
        // 	'image' => 'uploads/products/avatar.png',
        // 	'price' => 100,
        // 	'description' => 'Anim laborum est magna eu qui qui id velit aliquip minim consequat do cupidatat dolor esse exercitation.'
        // ];

        // $p2 = [
        // 	'name' => 'batik2',
        // 	'image' => 'uploads/products/avatar.png',
        // 	'price' => 200,
        // 	'description' => 'Anim laborum est magna eu qui qui id velit aliquip minim consequat do cupidatat dolor esse exercitation.'
        // ];

        // $p3 = [
        // 	'name' => 'batik3',
        // 	'image' => 'uploads/products/avatar.png',
        // 	'price' => 300,
        // 	'description' => 'Anim laborum est magna eu qui qui id velit aliquip minim consequat do cupidatat dolor esse exercitation.'
        // ];

        // $p4 = [
        // 	'name' => 'batik4',
        // 	'image' => 'uploads/products/avatar.png',
        // 	'price' => 400,
        // 	'description' => 'Anim laborum est magna eu qui qui id velit aliquip minim consequat do cupidatat dolor esse exercitation.'
        // ];

        // $p5 = [
        // 	'name' => 'batik5',
        // 	'image' => 'uploads/products/avatar.png',
        // 	'price' => 500,
        // 	'description' => 'Anim laborum est magna eu qui qui id velit aliquip minim consequat do cupidatat dolor esse exercitation.'
        // ];


        // App\Product::create($p1);
        // App\Product::create($p2);
        // App\Product::create($p3);
        // App\Product::create($p4);
        // App\Product::create($p5);

        factory(App\Product::class, 30)->create();
    }
}
