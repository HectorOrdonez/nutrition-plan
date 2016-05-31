<?php

use Illuminate\Database\Seeder;
use Src\Support\TruncableTable;

class UserSeeder extends Seeder
{
    use TruncableTable;

    public function run()
    {
        $this->truncateTable('users');

        $user = new \App\User();
        $user->name = 'root';
        $user->email = 'root@com';
        $user->password = bcrypt('12345');

        // Nutritional targets
        $user->calories = rand(1, 1000);
        $user->carbohydrates = rand(1, 1000);
        $user->proteins = rand(1, 1000);
        $user->fats = rand(1, 1000);
        $user->save();
    }
}
