<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'DIOR',
            'email' => 'genkigenki@out.look',
            'password'=> '2525_genki',
            'role' => 1,
            'icon_img' => 'vjnpvjsb',
            'user_comment' => 'ミスディオール',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
