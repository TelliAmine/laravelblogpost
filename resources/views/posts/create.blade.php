@extends('layouts.app')

@section('content')
<form class="form-group" method="POST" action="{{route('posts.store')}}">
    @csrf
    @include('posts.form')
    <br>
    <button type="submit" class="btn btn-block btn-primary">Add post</button>
    </form>

    @endsection('content')