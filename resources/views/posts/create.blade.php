@extends('layouts.app')

@section('content')
   <div class="container">
       <div class="row">
           <div class="col-md-6 offset-md-3">
               <h1>Create post</h1>
            <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="@error('title')
                    is-invalid
                  @enderror form-control" value="{{ old('title','') }}"  placeholder="Enter title">
                  @error('title')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                 
                </div>
                <br>

                <div class="form-group">
                    <label  for="body">Description</label>
                    <textarea class="@error('body')
                      is-invalid
                    @enderror form-control" name="body"  cols="30" rows="5">{{ old('body','') }}</textarea>
                    @error('body')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <br>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select class="@error('type')
                      is-invalid
                    @enderror form-control" name="type" >
                        <option value="">-----</option>
                        <option {{ old('type')=='sport'?'selected':'' }} value="sport">sport</option>
                        <option {{ old('type')=='art'?'selected':'' }} value="art">art</option>  
                    </select>
                    @error('type')
                      <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                </div>
                <br>
                <div class="form-group">
                  <legend><h6>Status:</h6></legend>
                    <div class="form-check">
                        <input {{ old('status')=='1'?'checked':'' }} type="radio" name="status" value="1" class="form-check-input" >
                        <label class="form-check-label" for="status">Yes</label>
                      </div>
                      <div class="form-check">
                        <input {{ old('status')=='0'?'checked':'' }} type="radio" name="status" value="0" class="form-check-input" >
                        <label class="form-check-label" for="status">No</label>
                      </div>
                      @error('status')
                          <p class="text-danger">{{ $message }}</p>
                     @enderror
                </div>
                <br>

                <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" name="image" >
                 
                </div>
                <br>
               
                <button  type="submit" class="btn btn-primary form-control">Save</button>
              </form>
           </div>
       </div>
   </div>
@endsection