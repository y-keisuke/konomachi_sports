<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Team;


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
     * @param \App\Models\User $user
     * @param \App\Models\Team $team
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        $post = new Post;
        $post->fill($form)->save();
        return redirect('posts/' . $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $p = Post::find($post->id);
        $team_id = $p->team->id;
        return view('posts.show', ['post' => $post, 'team_id' => $team_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $form = $request->all();
        unset($form['_token']);
        $post->fill($form)->save();
        return redirect('posts/' . $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $p = Post::find($post->id);
        $team_id = $p->team->id;
        $post->delete();
        return redirect('teams/' . $team_id);
    }
}
