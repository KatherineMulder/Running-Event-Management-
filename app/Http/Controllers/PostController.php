<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

        Post::create($incomingFields);

        return redirect()->route('forum.index');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id != Auth::id()) {
            return redirect()->route('forum.index')->with('error', 'Unauthorized action.');
        }

        return view('edit_post', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id != Auth::id()) {
            return redirect()->route('forum.index')->with('error', 'Unauthorized action.');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);

        return redirect()->route('forum.index')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id != Auth::id()) {
            return redirect()->route('forum.index')->with('error', 'Unauthorized action.');
        }

        $post->delete();

        return redirect()->route('forum.index')->with('success', 'Post deleted successfully.');
    }
}
