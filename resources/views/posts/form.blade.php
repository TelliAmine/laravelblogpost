<div>
        <label for="title">Your Title</label>
        <input class="form-control" value="{{old('title', $post->title ??null)}}" name="title" id="title" type="text">
    </div>
    <div><label for="content">Your content</label>
        <input class="form-control" name="content" value="{{old('content',$post->content??null)}}" id="content" type="text">
    </div>
       @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif