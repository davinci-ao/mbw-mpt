<?php

use Illuminate\Database\Seeder;

class ChaletTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Chalet::class, 5)->create();
        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'description' => Str::random(10),
        //     'price' => Int::random(10),
        //     'country' => Str::random(10),
        //     'housenr' => Str::random(10),
        //     'addition' => Str::random(10),
        //     'street' => Str::random(10),
        //     'place' => Str::random(10)
        // ]);
    }
}
