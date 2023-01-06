<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;
use App\Fav;
use App\Follow;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    const SEASON = ['春','夏','秋','冬'];
    const CATEGORY = ['トップス','アウター','ボトムス','シューズ','アクセサリー','コーディネート'];
    const SIZE = ['XS','S','M','L','XL'];
    const COLOR = ['白','黄色','オレンジ','赤','ピンク','紫','青','紺','水色','緑','黄緑','ベージュ','茶色','黒','シルバー','ゴールド'];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::withCount('Fav')->get();
        dd($posts);
        return view('detail_pos',compact('posts'));

    }


    public function ajaxlike(Request $request)
    {
        $id = Auth::user()->id;
        $post_id = $request->post_id;
        $like = new Fav;
        $post = Post::findOrFail($post_id);

        // いいね用
        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $post_id)) {
            //likesテーブルのレコードを削除
            $like = Fav::where('post_id', $post_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならFavテーブルに新しいレコードを作成する
            $like = new Fav;
            $like->post_id = $request->post_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $postLikesCount = $post->loadCount('fav')->likes_count;


        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいい
        $json = [
            'postLikesCount' => $postLikesCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }

    public function ajaxfollow(Request $request)
    {
        $id = Auth::user()->id;
        $followed_id = $request->follow_id;

        $follow = new Follow;

        // 空でない（既にフォローしている）なら
        if ($follow->follow_exist($id, $followed_id)) {
            //Followーブルのレコードを削除
            $follow = Follow::where('follower_id', $followed_id)->where('follow_id', $id)->delete();
        } else {
            //空（まだ「フォロー」していない）ならFollowテーブルに新しいレコードを作成する
            $follow = new Follow;
            $follow->follower_id = $followed_id;
            $follow->follow_id = Auth::user()->id;
            $follow->save();
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('new_post_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->post_title = $request->post_title;
        $post->season = $request->season;
        $post->category = $request->category;
        $post->size = $request->size;
        $post->color = $request->color;
        $post->comment = $request->comment;
        $post->user_id = $request->user_id;


        // photo 処理
        $file_name = $request->photo->getClientOriginalName();
        $img = $request->photo->storeAs('public', $file_name );
        $post->photo = $file_name;

        $post->save();

        $user = User::find($post->user_id);
        $post = Post::where('user_id',$post->user_id)->where('del_flg',0)->orderBy('created_at','desc')->paginate(6);;
        return view('private_user',[
            'user' => $user,
            'post' => $post,
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $season = self::SEASON;
        $category = self::CATEGORY;
        $size = self::SIZE;
        $color = self::COLOR;

        $post = Post::find($id);

        $user_id = $post->user_id;  // userのIDを取得
        $user = User::find($user_id);  //Userの中にuser_id


        if(Auth::check()) {
            $fav_model = Fav::like_exist(Auth::user()->id, $id);
            $follow_model = Follow::follow_exist($user_id,Auth::user()->id);

            $posts = Post::withCount('Fav')->find($id);
            // dd($posts);
            return view('detail_post',[
                'post' => $post,
                'user' => $user,
                'season' => $season[$post->season],
                'category' => $category[$post->category],
                'size' => $size[$post->size],
                'color' => $color[$post->color],
                'fav' => $fav_model,
                'follow' => $follow_model,
                'posts' =>$posts,
            ]);

        } else {
            return view('detail_post',[
                'post' => $post,
                'user' => $user,
                'season' => $season[$post->season],
                'category' => $category[$post->category],
                'size' => $size[$post->size],
                'color' => $color[$post->color],
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)   //post.edit
    {
        $post =  Post::find($id);
        $user_id = $post->user_id;  // userのIDを取得
        $user = User::find($user_id);

        return view('edit_post',[
            'post' => $post,
            'user' => $user,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->post_title = $request->post_title;
        $post->comment = $request->comment;
        if(isset($request->photo )){
            $file_name = $request->photo->getClientOriginalName();
            $img = $request->photo->storeAs('public', $file_name );
            $post->photo = $file_name;
        }
        // $image = $request->file('icon_img');

        $post->save();

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =  Post::find($id);
        $post->del_flg = 1;


        $post->save();

        return redirect()->route('user.index');
    }
}
