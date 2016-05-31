<?php

use App\Food;
use Illuminate\Database\Seeder;
use Src\Support\TruncableTable;

class FoodSeeder extends Seeder
{
    use TruncableTable;
    
    public function run()
    {
        $this->truncateTable('foods');

        factory(Food::class, 20)->create();
    }

}
