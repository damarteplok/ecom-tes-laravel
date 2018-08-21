<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
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
        	'name' => 'damar huda',
        	'alamat' => 'suburan 74',
        	'nohp' => '081220071754',
        	'email' => 'mie.yaminasin@gmail.com',
            'password' => bcrypt('password'),
        	
        ];

        
        App\Customer::create($p1);
        
    }
}
