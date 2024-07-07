<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    
    public function index()
    {
        // Fetch all posts
        $posts = Post::all();
        
        // Fetch posts for the authenticated user
        $myPosts = Auth::check() ? Auth::user()->posts : collect();

        // Pass posts to the view
        return view('forum', ['posts' => $posts, 'myPosts' => $myPosts]);
    }

    public function viewMyPosts()
    {
        // Fetch posts for the authenticated user
        $posts = Auth::check() ? Auth::user()->posts()->latest()->get() : collect();

        // Pass posts to the view
        return view('myposts', ['myposts' => $posts]);
    }

    public function store(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        // Check if user is authenticated
        if (Auth::check()) {
            $incomingFields['user_id'] = Auth::id();
        } else {
            return redirect()->route('forum.index')->with('error', 'Unauthorized access.');
        }

        Post::create($incomingFields);

        return redirect()->route('forum.index');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        // Check if the authenticated user is the owner of the post
        if ($post->user_id != Auth::id()) {
            return redirect()->route('forum.index')->with('error', 'Unauthorized access.');
        }

        return view('forum.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        // Check if the authenticated user is the owner of the post
        if ($post->user_id != Auth::id()) {
            return redirect()->route('forum.index')->with('error', 'Unauthorized access.');
        }

        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);

        $post->title = strip_tags($request->title);
        $post->body = strip_tags($request->body);
        $post->save();

        return redirect()->route('forum.index')->with('status', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Check if the authenticated user is the owner of the post
        if ($post->user_id != Auth::id()) {
            return redirect()->route('forum.index')->with('error', 'Unauthorized access.');
        }

        $post->delete();

        return redirect()->route('forum.index')->with('status', 'Post deleted successfully.');
    }

 
}


