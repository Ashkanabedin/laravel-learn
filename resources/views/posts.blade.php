<html>
    <head>
    </head>
    <body>
      <div>
        <ul>
          @foreach ($posts as $post)
          <li> <a href="/post/{{$post->id}}">{{ $post->title}}</a></li>
          @endforeach
        </ul>
        <a href="/post/create">Create New</a>
      </div>

    </body>
</html>
