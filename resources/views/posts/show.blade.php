@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="m-3">Single post</h1>
            <div class="card">
                <div class="card-header">{{ $post->title }}
                    <span class="float-end"><a href="{{ route('posts.index') }}">back</a></span>
                </div>

                <div class="card-body">
                   <img src="/storage/{{ $post->image }}" alt=""> 
                   {{ $post->body }}
                </div>

                <div class="card-footer">
                   Type: {{ $post->type }} Name:{{ $post->user->name }}
                    <span class="float-end">
                        <form action="{{ route('posts.destroy',[$post]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                       
                    </span>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
