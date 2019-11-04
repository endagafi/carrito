<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'nombre' => "MEN'S BETTER THAN NAKED & JACKET",
                'detalle' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua consequat.',
                'stock' => 21,
                'precio' => 200.10,
                'imagen' => 'http://images.thenorthface.com/is/image/TheNorthFace/236x204_CLR/mens-better-than-naked-jacket-AVMH_LC9_hero.png',
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            [
                'nombre' => "WOMEN'S BETTER THAN NAKED™ JACKET",
                'detalle' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua consequat.',
                'stock' => 400,
                'precio' => 1600.21,
                'imagen' => 'http://images.thenorthface.com/is/image/TheNorthFace/236x204_CLR/womens-better-than-naked-jacket-AVKL_NN4_hero.png',
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            [
                'nombre' => "WOMEN'S SINGLE-TRACK SHOE",
                'detalle' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua consequat.',
                'stock' => 37,
                'precio' => 378.00,
                'imagen' => 'http://images.thenorthface.com/is/image/TheNorthFace/236x204_CLR/womens-single-track-shoe-ALQF_JM3_hero.png',
                'created_at' => new DateTime,
                'updated_at' => null,
            ],
            [
                'nombre' => 'Enduro Boa® Hydration Pack',
                'detalle' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua consequat.',
                'stock' => 10,
                'precio' => 21.10,
                'image' => 'http://images.thenorthface.com/is/image/TheNorthFace/236x204_CLR/enduro-boa-hydration-pack-AJQZ_JK3_hero.png',
                'created_at' => new DateTime,
                'updated_at' => null,
            ]
        ];

        DB::table('productos')->insert($products);
    }
}
