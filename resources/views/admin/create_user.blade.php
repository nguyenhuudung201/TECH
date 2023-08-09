@extends('layouts/layouts')

<h1>Add Users</h1>

@if($errors->any())
    @foreach($errors->all() as $error)
    <p style="color:red;">{{ $error }}</p>
    @endforeach
@endif

<form  action="{{ route('storeUsers') }} " method="POST">
    @csrf
    @method('post')
   <div class="form-group">
    <input  class="form-control" type="text" name="name" placeholder="Enter Name">
    <br><br>
    <input  class="form-control" type="email" name="email" placeholder="Enter Email">
    <br><br>
    <input  class="form-control" type="password" name="password" placeholder="Enter Password">
    <br><br>
    <input  class="form-control"  type="password" name="password_confirmation" placeholder="Enter Confirm Password">
    <br><br>
    <input  type="submit" value="Save User">
   </div>
</form>

@if(Session::has('success'))
    <p style="color:green;">{{ Session::get('success') }}</p>
@endif
