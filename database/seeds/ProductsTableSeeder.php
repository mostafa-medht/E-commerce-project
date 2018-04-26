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
        $p1= [
            'name' => 'Learn to build website in HTML5',
            'image' => 'uploads/products/book.png',
            'price' => 5000,
            'description' => 'Loream ipsum dolor sit amet,Loream ipsum dolor sit amet,Loream ipsum dolor sit amet.'
        ];

        $p2= [
            'name' => 'PHP Development in depth',
            'image' => 'uploads/products/book.png',
            'price' => 2400,
            'description' => 'Loream ipsum dolor sit amet,Loream ipsum dolor sit amet,Loream ipsum dolor sit amet.'
        ];

        Product::create($p1);
        Product::create($p2);
    }
}
