<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::onlyTrashed()->get();
        return view('admin.index',compact('posts'));
    }

    public function destroy($id)
    {
        $post=Post::withTrashed()->findOrFail($id);

        $post->forceDelete();

        return redirect(route('admin.index'))->with('message','Post permanently deleted');
    }

    public function restore($id)
    {
        $post=Post::withTrashed()->findOrFail($id);

        $post->restore();

        return redirect(route('admin.index'))->with('message','Post successfully restored');
    }
}
