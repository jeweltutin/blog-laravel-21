<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'jewel',
            'email' => 'test@gmail.com',
            'password' => bcrypt('12345678'),
            'bio' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia distinctio veniam odio ea maiores est, laudantium ad commodi. Quibusdam nemo reiciendis porro, impedit eius sequi praesentium hic voluptate nulla minima!'
        ]);
    }
}
