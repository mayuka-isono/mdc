<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $user = User::find($id);
        $post = Post::where('user_id',$id)->get()->toArray();

        return view('private_user',[
            'user' => $user,
            'post' => $post,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user =  User::find($id);
        return view('edit_user_info',[
            'user' => $user,
        ]);  //user.edit

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
        $user =  User::find($id);
        $user->name = $request->name;
        $user->user_comment = $request->user_comment;

        $file_name = $request->icon_img->getClientOriginalName();
        $img = $request->icon_img->storeAs('public', $file_name );
        $user->icon_img = $file_name;
        // $image = $request->file('icon_img');

        $user->save();
        $post = Post::where('user_id',$id)->get()->toArray();

        return view('private_user',[
            'user' => $user,
            'post' => $post,

        ]);
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
