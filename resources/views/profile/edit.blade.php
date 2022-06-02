@extends('layouts.app')

@section('content')
   <div class="container">
       <div class="row">
           <div class="col-md-6 offset-md-3">
               <h1>Edit Profile</h1>
            <form method="POST" action="{{ route('profile.update',[$user]) }}" >
              @csrf
              @method('PUT')
                <div class="form-group">
                  <label for="title">User Name</label>
                  <input type="text" name="name" class="@error('name')
                    is-invalid
                  @enderror form-control" value="{{ old('name',$user->name) }}"  placeholder="Enter name">
                  @error('name')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                 
                </div>
                <br>

                

                   <div class="form-group">
                      <label for="email">Email</label>
                      <input name="email" class="form-control" type="email" readonly value="{{ $user->email }}">
                  </div>
                  <br> 

                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="@error('address')
                      is-invalid
                    @enderror form-control" value="{{ old('address',$user->profile ? $user->profile->address :'') }}"  placeholder="Enter address">
                    @error('address')
                       <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                   
                  </div>
                  <br>

                <div class="form-group">
                    <label  for="biography">Biography</label>
                    <textarea class="@error('biography')
                      is-invalid
                    @enderror form-control" name="biography"  cols="30" rows="5">{{ old('biography',$user->profile ? $user->profile->biography :'') }}</textarea>
                    @error('biography')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <br>
                <button  type="submit" class="btn btn-primary form-control">Save</button>
              </form>
           </div>
       </div>
   </div>
@endsection