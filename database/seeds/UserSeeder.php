<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = 'root';
        $user->email = 'root@com';
        $user->password = bcrypt('12345');
        $user->save();
    }
}
