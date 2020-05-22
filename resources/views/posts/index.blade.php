
@extends('layouts.app')

@section('content')
<h1>List of posts</h1>
<ul class="list-group">
    @forelse($posts as $post)
    <li class="list-group-item"><h2><a href="{{route('posts.show',['post'=>$post->id])}}">{{$post->title}}</a></h2></li>
    <p>{{$post->content}}</p>
    <em>{{$post->created_at}}</em>
<div class="flex" style="display:flex ;">
     <a  class="btn btn-warning"  href="{{route('posts.edit',['post'=>$post->id])}}">Edit</a>
    <form style="display: inline" method="POST" action="{{route('posts.destroy',['post'=>$post->id])}}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
    </form></div>
    <br>
    @empty
    No posts
    @endforelse

</ul>


@endsection('content')

