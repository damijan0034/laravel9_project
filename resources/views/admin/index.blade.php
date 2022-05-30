@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>

    @endif
    <h1 class="text-center mb-5">All deleted Posts</h1>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <table class="table table-striped">
                <thead>
                    <tr>

                        <th scope="col">Title</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>

                        <td>
                            {{ $post->title }}
                        </td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->status ? 'yes' : 'no'}}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="{{ route('admin.destroy',[$post->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <form action="{{ route('admin.restore',[$post->id]) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-sm btn-warning">Restore</button>
                                    </form>
                                </div>
                            </div>



                        </td>
                    </tr>
                    @endforeach



                </tbody>
            </table>

        </div>
    </div>
</div>

<style>
    .w-5 {
        display: none;
    }
</style>
@endsection