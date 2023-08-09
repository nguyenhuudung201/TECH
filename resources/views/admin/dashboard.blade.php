@extends('layouts/layouts')

@section('space-work')
<h2 class="mb-4">Super Admin</h2>
    <div class="container">
        <a href="/logout">Logout</a>
        <br>
        <a href="{{ route('superAdminUsers') }}"> Users</a>
    </div>


@endsection
