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
                'id'    => 1,
                'name'  => 'Uncategorized',
                'slug'  => 'uncategorized',
                'image' => null
            ],
            [
                'id'    => 2,
                'name'  => 'Headphone',
                'slug'  => 'headphone',
                'image' => 'commons/images/categories/headphone.jpeg'
            ],
            [
                'id'    => 3,
                'name'  => 'Watch',
                'slug'  => 'watch',
                'image' => 'commons/images/categories/watch.jpeg'
            ],
            [
                'id'    => 4,
                'name'  => 'Phone',
                'slug'  => 'phone',
                'image' => 'commons/images/categories/phone.jpeg'
            ],
            [
                'id'   => 5,
                'name' => 'Game',
                'slug' => 'game',
                'image' => 'commons/images/categories/game.jpeg'
            ],
            [
                'id'    => 6,
                'name'  => 'Laptop',
                'slug'  => 'laptop',
                'image' => 'commons/images/categories/laptop.jpeg'
            ],
            [
                'id'    => 7,
                'name'  => 'Televison',
                'slug'  => 'televison',
                'image' => 'commons/images/categories/televison.jpeg'
            ]
        ]);
    }
}
