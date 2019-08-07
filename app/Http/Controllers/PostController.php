<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $team_id = $request->team_id;
        $posts = Post::where('team_id', $team_id)->paginate(10);
        return view('posts.index', ['posts' => $posts, 'team_id' => $team_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $team_id = $request->team_id;
        return view('posts.create', ['team_id' => $team_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $time = new Carbon(Carbon::now());
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->user_id;
        $post->team_id = $request->team_id;
        if ($request->image) {
            $post->image = $request->image->storeAs('public/post_images', $time . '_' . $request->user_id . '.jpg');
        }
        $post->save();

        return redirect('posts/' . $post->id)->with('success_msg', '活動状況を投稿しました');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $p = Post::find($post->id);
        $team_id = $p->team->id;
        $image = str_replace('public/', '/storage/', $post->image);
        return view('posts.show', ['post' => $post, 'team_id' => $team_id, 'image' => $image]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $form = $request->all();
        unset($form['_token']);
        $post->fill($form)->save();
        return redirect('posts/' . $post->id)->with('success_msg', '活動状況を編集しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $p = Post::find($post->id);
        $team_id = $p->team->id;
        $post->delete();
        return redirect('teams/' . $team_id)->with('success_msg', '活動状況を削除しました');
    }
}
