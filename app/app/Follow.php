<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'Follow'; //命名規則

    public function user() {
        return $this->belongsTo('App\User','user_id','id');
    }

     //フォローが既にされているかを確認
        public static function follow_exist($id,$user_id)
        {
            $exist = Follow::where('follow_id', '=', $id)->where('follower_id', '=', $user_id)->get();

            // レコード（$exist）が存在するなら
            if (!$exist->isEmpty()) {
                return true;
            } else {
            // レコード（$exist）が存在しないなら
                return false;
            }
        }

}
