<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Post;

use App\Notifications\ResetPassword;  //****追加****

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function post() {
        return $this->hasMany('App\Post','user_id','id');
    }

    /**
    * パスワードリセット通知の送信
    *
    * @param  string  $token
    * @return void
    */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token)); //****変更****
    }


    //　いいね機能
    // ユーザーの投稿
    public function goodPost()
    {
        return $this->hasMany(Post::class);
    }

    // ユーザーがいいねしている投稿
    public function fav()
    {
        return $this->hasMany(Fav::class);
    }


}
