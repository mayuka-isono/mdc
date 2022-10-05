<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id'=> 1,
            'post_title' => 'サツマイモカラー',
            'season'=> 2,
            'category' => 3,
            'color' => 5,
            'size' => 3,
            'del_flg' => 0,
            'photo' => 'fjii34',
            'comment' =>'秋のお芋カラー',
            'created_at' => Carbon::now(),
            'updated_at' => carbon::now(),
        ]);
    }
}
