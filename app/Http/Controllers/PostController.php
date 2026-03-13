<?php

namespace App\Http\Controllers;

use App\Events\postcreated;
use App\Jobs\blogPost;
use App\Models\post;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller implements HasMiddleware
{

    public function sendEmail()
    {
        dispatch(new blogPost());

        dd('Email has been delivered');
    }

    public static function  middleware()
    {
        return [
            new middleware('auth:sanctum', except: ['index', 'show'])
        ];
    }
    /**
     * 
     * Display a listing of the resource.
     */
    public function index()
    {
        Event::dispatch(new Postcreated());
        $posts = cache::remember('posts', now()->addMinutes(10), function () {
            return Post::get();
        });
        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //validate
        $attributes =   $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = new Post($attributes);
        $post->user_id = auth()->id();
        $post->save();
        return response()->json(['message' => 'post created', 'post' => $post], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        $this->authorize('modify', $post);

        $attributes = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post->update($attributes);
        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        $this->authorize('modify', $post);
        $post->delete();
        return ['message' => 'post deleted'];
    }
}
