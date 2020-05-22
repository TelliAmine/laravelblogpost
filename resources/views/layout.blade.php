<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="" href="{{mix('/css/app.css')}}">
    <link rel="stylesheet" type="" href="{{mix('/css/theme.css')}}">
    <title>Document</title>
</head>

<body>


    <nav class="navbar navbar-expand navbar-dark bg-success">
        <ul class="nav navbar-nav">

            <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('about')}}">about</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('posts.create')}}">create posts</a></li>

        </ul>
    </nav>
    @if(session()->has('status'))
    <h3 style="color:green">
        {{session()->get('status')}}
    </h3>
    @endif
 <div class="container" >  @yield('content')</div>
  

    <script src="{{mix('/css/app.css')}}">

    </script>

</body>

</html>