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
        $user->save();
    }
}
