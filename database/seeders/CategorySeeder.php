<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'watch',
                'slug' => 'watch'
            ],
            [
                'name' => 'laptop',
                'slug' => 'laptop'
            ]
        ]);
    }
}
