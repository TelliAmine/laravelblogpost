@extends('layouts.app')

@section('content')


<h2>{{$post->title}}</h2>

<p>{{$post->content}}</p>
<em>{{$post->created_at->diffForHumans()}}</em>
<p> statut:
 @if ($post->active)
  enabled
 @else
disabled
 @endif 
</p>



@endsection('content')