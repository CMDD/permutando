<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'John Alvaro';
        $user->email = 'jhon54plex@gmail.com';
        $user->password = bcrypt('qwe123');
        $user->save();

         $user = new User();
        $user->name = 'John Alvaro';
        $user->email = 'desarrollo@minutodedios.tv';
        $user->password = bcrypt('123456');
        $user->save();
    }
}
