<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Models\User::class,20)->create();
        DB::table('users')->insert([
            'name' => 'OLDBIG9',
            'email' => 'oldbig9@qq.com',
            'password' => bcrypt('masaqiao9'),
        ]);
    }
}
