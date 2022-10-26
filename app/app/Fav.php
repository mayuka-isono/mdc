<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fav extends Model
{
    protected $table = 'Fav'; //命名規則

    public function user() {
        return $this->belongsTo('App\User','user_id','id');
    }

     //いいねしているユーザー
    public function goodUser()
    {
        return $this->belongsTo(User::class);
    }

     //いいねしている投稿
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    //いいねが既にされているかを確認
    public static function like_exist($id,$post_id)
    {
        $exist = Fav::where('user_id', '=', $id)->where('post_id', '=', $post_id)->get();

        // レコード（$exist）が存在するなら
        if (!$exist->isEmpty()) {
            return true;
        } else {
        // レコード（$exist）が存在しないなら
            return false;
        }
    }

}
