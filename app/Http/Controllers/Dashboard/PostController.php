<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $query=Post::where('status',1);

        if(request()->type){
            $type=request()->type;
            $query->where('type',$type);
        }

        $posts=$query
                ->with('user')
                ->orderBy('id','desc')
                ->paginate(5);

        return view('dashboard.index',compact('posts'));
    }

    public function show(Post $post)
    {
        return view('dashboard.show',compact('post'));
    }
}
