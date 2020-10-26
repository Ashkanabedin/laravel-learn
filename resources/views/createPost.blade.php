<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
      <form method="POST" action="/post" >
        @csrf
        <div>
          <input type="text" name="title" placeholder="title">
        </div>

        <div>
          <textarea name="description" placeholder="description"></textarea>
        <div>
          <button type="submit">Create post</button>
        </div>
        <a href="/post">Go to Posts</a>

      </form>
    </body>
</html>
