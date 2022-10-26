<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DisplayController extends Controller
{
    public function index(Request $request) {

    $post = Post::withCount('fav')->where('del_flg',0)->orderBy('created_at','desc')->paginate(6);
    $user = Auth::user();

    // 検索フォームで入力された値を取得する
    $search = $request->input('search');

    // クエリビルダ
    $query = Post::query();

   // もし検索フォームにキーワードが入力されたら
    if ($search) {
        // 全角スペースを半角に変換
        $spaceConversion = mb_convert_kana($search, 's');
        // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
        $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
        // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
        foreach($wordArraySearched as $value) {
            $query->where('post_title', 'like', '%'.$value.'%')->where('del_flg',0);
        }
    
        $post=$query->paginate(6);
    }

    if(Auth::check()) {  //ログインしているユーザーかどうか
        if($user->role == 0 ) {  //true(ログインユーザーだったらifでroleが0かどうか)
            return view('administrator',[
                'post' => $post,
            ]);
        }else {
                return view('top',[
                    'post' => $post,
                ]);
        }
    }else {
            return view('top',[
                'post' => $post,
            ]);
    }
    }

}
