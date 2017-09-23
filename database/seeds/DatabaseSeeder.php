<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
          $user = new User();
        $user->name="admin";
        $user->email = "admin@admin.com";
        $user->rol = 1;
        $user->enable = 1;
        $user->password = Hash::make('admin');
        $user->save();
    }
}
