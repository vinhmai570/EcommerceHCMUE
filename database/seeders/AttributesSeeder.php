<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->insert([
            [
                'id'   => 1,
                'name' => 'Size'
            ],
            [
                'id'   => 2,
                'name' => 'Color'
            ]
        ]);

        DB::table('attribute_values')->insert([
            [
                'attribute_id' => 1,
                'value_name'         => 'S'
            ],
            [
                'attribute_id' => 1,
                'value_name' => 'M'
            ],
            [
                'attribute_id' => 1,
                'value_name' => 'L'
            ],
            [
                'attribute_id' => 2,
                'value_name' => 'Black'
            ],
            [
                'attribute_id' => 2,
                'value_name'         => 'Yellow'
            ],
            [
                'attribute_id' => 2,
                'value_name'         => 'White'
            ],
            [
                'attribute_id' => 2,
                'value_name'         => 'Red'
            ],
        ]);
    }
}
