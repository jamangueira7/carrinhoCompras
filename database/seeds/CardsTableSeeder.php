<?php

use Illuminate\Database\Seeder;
use App\Helpers\Helper;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(\App\User::class,10)->create();
        $categories = factory(\App\Category::class,50)->create();

        $categories->each(function ($category){
            factory(\App\Product::class, rand(5,10))->create([
                'category_id' => $category->id,
            ]);
        });

        $users->each(function ($user){
            factory(\App\Address::class, rand(2,5))->create([
                'user_id' => $user->id,
            ]);
        });


        $product = \App\Product::all();
        $user = \App\User::all();
        $address = \App\Address::all();

        for ($x = 1; $x <= 50; $x++) {
            $code = Helper::codeGeneration();
            $user_id = rand(1, $user->last()['id']);
            $address_id = rand(1, $address->last()['id']);
            $total = 0;
            for ($i = 1; $i <= rand(1, 10); $i++) {
                $product_id = rand(1, $product->last()['id']);
                $qtd = rand(1, 5);
                $total +=$product[$product_id]->price * $qtd;
                factory(\App\Card::class, 1)->create([
                    'product_id' => rand(1, $product_id),
                    'qtd' => $qtd,
                    'code' => $code,
                    'unitary_value' => $product[$product_id]->price,
                    'total' => $product[$product_id]->price * $qtd
                ]);
            }

            factory(\App\Shopping::class, 1)->create([
                'user_id' => $user_id,
                'code' => $code,
                'address_id' => $address_id,
                'total' => $total
            ]);
        }
    }
}


