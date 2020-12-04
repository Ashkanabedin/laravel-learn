<html>
    <head>
    </head>
    <body>
      <div>
        <h1>{{ $post->title}}</h1>
      </div>
      <div>
        <h1>{{ $post->description}}</h1>
      </div>
      <div>
        <img src="{{asset('/storage/images/' . $post->image)}}" alt="image">
      </div>
        <a href="/post">go to posts</a></br>
        <a href="/post/create">Create New</a></br>
        <a href="/post/{{$post->id}}/edit">edit</a></br>

        <form method="POST" action="/post/{{$post->id}}">
          {{method_field('DELETE')}}
          @csrf
          <div>
            <button type="submit">Delete post</button>
          </div>

        </form>

    </body>
</html>
