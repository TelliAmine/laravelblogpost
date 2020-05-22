@extends('layouts.app')

@section('content')
<h1>Edit Post</h1>
<form class="form-group" method="POST" action="{{route('posts.update',['post'=>$post->id])}}">
    @csrf
    @method('PUT')
  
    @include('posts.form')
    <br>
    <button type="submit" class="btn btn-block btn-primary">Update Post </button>
    </form>

    @endsection('content')