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
                'id' => 1,
                'name' => 'Uncategorized',
                'slug' => 'uncategorized'
            ],
            [
                'name' => 'Watch',
                'slug' => 'watch'
            ],
            [
                'name' => 'Laptop',
                'slug' => 'laptop'
            ]
        ]);
    }
}
