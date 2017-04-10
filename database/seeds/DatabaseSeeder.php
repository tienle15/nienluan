<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call('UsersTableSeeder');
    }
}


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	array(
        		'maql'=> 'QL001', 
        		'name'=> 'Lê Thị Cẩm Tiên', 
        		'email'=> 'tienb1304736@student.ctu.edu.vn', 
        		'password'=> Hash::make(123456), 
        		)
        	]);
    }
}