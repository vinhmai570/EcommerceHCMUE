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
                'id'   => 1,
                'name' => 'Uncategorized',
                'slug' => 'uncategorized'
            ],
            [
                'id'   => 2,
                'name' => 'Watch',
                'slug' => 'watch'
            ],
            [
                'id'   => 3,
                'name' => 'Laptop',
                'slug' => 'laptop'
            ]
        ]);
    }
}
