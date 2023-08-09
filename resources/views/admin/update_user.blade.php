@extends('layouts/layouts')

<h1>Update User</h1>

@if($errors->any())
    @foreach($errors->all() as $error)
    <p style="color:red;">{{ $error }}</p>
    @endforeach
@endif

<form action="{{route('updateUser',['user'=>$user])}}" method="post">
    @csrf
    @method('put')
   <div class="form-group">
    <input  class="form-control" type="text" name="name" placeholder="Enter Name" value="{{$user->name}}">
    <br><br>
    <input  class="form-control" type="email" name="email" placeholder="Enter Email"  value="{{$user->email}}">
    <br><br>
    <input  class="form-control" type="password" name="password" placeholder="Enter Password"  value="{{$user->password}}">
    <br><br>
    <input  class="form-control"  type="password" name="password_confirmation" placeholder="Enter Confirm Password" >
    <br><br>
    <input  type="submit" value="Update">
   </div>
</form>

@if(Session::has('success'))
    <p style="color:green;">{{ Session::get('success') }}</p>
@endif
