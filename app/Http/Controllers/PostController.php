<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::where('user_id',auth()->user()->id)
                ->with('user')
                ->orderBy('id','desc')
                ->paginate(5);

        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=>'required',
            'body'=>'required',
            'type'=>'required',
            'status'=>'required',
            'image'=>'sometimes|mimes:png,jpg,jpeg'
        ]);

        $post=auth()->user()->posts()->create($data);

        if($request->file('image')){
            $file=$request->file('image');
            $imageName=time() .'.'.$file->extension();
            $file->move(public_path('storage'),$imageName);

            $post['image']=$imageName;
            $post->save();
        }

        return redirect('/posts')->with('message','Post successfuly created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $this->authorize('view',$post);
        
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update',$post);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data=$request->validate([
            'title'=>'required',
            'body'=>'required',
            'type'=>'required',
            'status'=>'required',
            'image'=>'sometimes|mimes:png,jpg,jpeg'
        ]);

        $post->update($data);

        if($request->file('image')){
            $file=$request->file('image');
            $imageName=time() .'.'.$file->extension();
            $file->move(public_path('storage'),$imageName);

            $post['image']=$imageName;
            $post->save();
        }

      

        return redirect(route('posts.index'))->with('message','Post successfuly updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);

        

        $post->delete();

       

        return redirect(route('posts.index'))->with('message','Post successfuly deleted');
    }
}
