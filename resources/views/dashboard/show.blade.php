@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="m-3">Single post</h1>
            <div class="card">
                <div class="card-header">{{ $post->title }}
                    <span class="float-end"><a href="{{ route('dashboard.index') }}">back</a></span>
                </div>

                <div class="card-body">
                   <img src="/storage/{{ $post->image }}" alt=""> 
                   {{ $post->body }}
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
