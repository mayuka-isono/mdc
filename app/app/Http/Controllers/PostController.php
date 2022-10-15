<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;

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

        return view('detail_post');
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
        $post = Post::where('user_id',$post->user_id)->get()->toArray();
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

        return view('detail_post',[
            'post' => $post,
            'user' => $user,
            'season' => $season[$post->season],
            'category' => $category[$post->category],
            'size' => $size[$post->size],
            'color' => $color[$post->color],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
