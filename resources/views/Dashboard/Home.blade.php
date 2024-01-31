@extends('layouts.main')

@section('container')
    <div class="container">
    <h1 center>Welcome Back {{ auth()->user()->name}}</h1>
    <hr>
    </div>
@endsection
