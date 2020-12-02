@extends('app')

@section('title', 'Login')

@section('content')
    <form action="/login" method="post">
        @csrf
        <input type="text" name="username" required placeholder="Enter username">
        <input type="password" name="password" required placeholder="Enter password">
        <input type="submit" name="login" value="Login">
    </form>
@endsection