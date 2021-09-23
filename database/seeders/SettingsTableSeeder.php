<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('settings')->insert([
            'name' => 'My Personal Blog',
            'copyright' => 'Copyright C 2020 All rights reserved'
        ]);
    }
}
