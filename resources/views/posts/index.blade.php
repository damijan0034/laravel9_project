@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            
        @endif
        <h1 class="text-center mb-5">All my posts</h1>
        
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <table class="table table-striped">
                    <thead>
                      <tr>
                          <th>Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        <span class="float-end"><a href="{{ route('posts.create') }}">New post</a></span>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>
                                <img height="100" width="200" src="{{ $post->thumbnail }}" alt="">
                            </td>
                            <td >
                                <a href="{{ route('posts.show',[$post]) }}">{{ $post->title }}</a>
                            </td>
                            <td >{{ $post->type }}</td>
                            <td >{{ $post->status ? 'yes' : 'no'}}</td>
                           <td>
                               <a href="{{ route('posts.edit',[$post]) }}" class="btn ntn-sm btn-warning">Edit</a>
                           </td>
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