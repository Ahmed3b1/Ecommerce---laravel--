<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use App\Models\Product ;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $categories = [
            ['id' => 1 , 'name' => 'Electronics' , 'description' => '' , 'imagepath' => 'assets\img\electronics.jpg'],
            ['id' => 2 , 'name' => 'Food' , 'description' => '' , 'imagepath' => 'assets\img\food.jpg'] ,
            ['id' => 3 , 'name' => 'makeup' , 'description' => '' , 'imagepath' => 'assets\img\makeup.jpg'] ,
            ['id' => 4 , 'name' => 'bags' , 'description' => '' , 'imagepath' => 'assets\img\bags.jpg'] ,
            ['id' => 5 , 'name' => 'watches' , 'description' => '' , 'imagepath' => 'assets\img\watches.jpg'] ,
            ['id' => 6 , 'name' => 'cameras' , 'description' => 'electronic cameras' , 'imagepath' => 'assets\img\camera.jpg'] 
        ] ;

        DB::table('categories')->insertOrIgnore($categories);

        for($i = 1 ; $i <= 25 ; $i++) {
            Product::create([
                'name' => 'product' . $i , 
                'description' => 'this is product number' . $i ,
                'price' => rand(10 , 100) ,
                'quantity' => rand(1 , 50),
                'imagepath' => '' ,
                'category_id' => rand(1, 6)
            ]) ;
        }
    }
}
