@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            
        @endif
        <h1 class="text-center mb-5">Dashboard page</h1>
        
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('dashboard.index') }}" class="btn btn-primary">All posts</a><br><br>
                <a href="{{ route('dashboard.index',['type'=>'sport']) }}" class="btn btn-success">Sport posts</a><br><br>
                <a href="{{ route('dashboard.index',['type'=>'art']) }}" class="btn btn-warning">Art posts</a>
            </div>
            <div class="col-md-6 offset-md-1">
                <table class="table table-striped">
                    <thead>
                      <tr>
                          <th>Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Type</th>
                        <th scope="col">Name</th>
                    
                        @if (auth()->user())
                             <span class="float-end"><a href="{{ route('posts.index') }}">My posts</a></span>
                        @endif
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>
                                <img height="100" width="200" src="{{ $post->thumbnail }}" alt="">
                            </td>
                            <td >
                                <a href="{{ route('dashboard.show',[$post]) }}">{{ $post->title }}</a>
                            </td>
                            <td >{{ $post->type }}</td>
                            <td >{{ $post->user->name}}</td>
                          
                          </tr>
                        @endforeach
                     
                     
                       
                    </tbody>
                  </table>
                  {{ $posts->links() }}
            </div>
        </div>
    </div>

    <style>
        .w-5{
            display: none;
        }
    </style>
@endsection