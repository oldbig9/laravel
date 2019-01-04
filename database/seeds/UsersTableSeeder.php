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
        factory(App\User::class,20)->create();
        DB::table('users')->insert([
            'name'=>'OLDBIG9',
            'email'=>'oldbig9@qq.com',
            'password'=>'$2y$10$geLEyijJ149BSB2SOPdYiep5tpUDglZGDIQzNk8gcCT0x1eYkRy9K'
        ]);
    }
}
