<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
      <form method="POST" action="/post/{{$post->id}}">
      {{method_field('PATCH')}}
        @csrf
        <div>
          <input type="text" name="title" placeholder="title" value="{{$post->title}}">
        </div>

        <div>
          <textarea name="description" placeholder="description">{{$post->description}}</textarea>
        <div>
          <button type="submit">Edit post</button>
        </div>
        <a href="/post">Go to Posts</a>
      </form>
      <form method="POST" action="/post/{{$post->id}}">
        {{method_field('DELETE')}}
        @csrf
        <div>
          <button type="submit">Delete post</button>
        </div>

      </form>
    </body>
</html>
