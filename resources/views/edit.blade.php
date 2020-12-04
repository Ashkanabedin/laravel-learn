<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
      <form method="POST" action="/post/{{$post->id}}" enctype="multipart/form-data">
      {{method_field('PATCH')}}
        @csrf
        <div>
          <input type="text" name="title" placeholder="title" value="{{$post->title}}">
        </div>

        <div>
          <textarea name="description" placeholder="description">{{$post->description}}</textarea>
        </div>
        <div>
          <img src="{{asset('/storage/images/' . $post->image)}}" alt="image">
          <input type="file" name="image">
        </div>

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
