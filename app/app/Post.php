<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user() {
        return $this->belongsTo('App\User','user_id','id');
    }

        //いいね用

        public function fav()
        {
            return $this->hasMany(Fav::class);
        }
}
