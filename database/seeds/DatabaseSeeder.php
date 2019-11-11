<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //needs if so it doesnt add it two times

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'mpt.test.1.email@gmail.com',
            'password' => bcrypt('Testtest123'),
        ]);
    }
} 
