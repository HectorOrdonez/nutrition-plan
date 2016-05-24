<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::statement("TRUNCATE TABLE users");

        $user = new \App\User();
        $user->name = 'root';
        $user->email = 'root@com';
        $user->password = bcrypt('12345');
        $user->save();
    }
}
