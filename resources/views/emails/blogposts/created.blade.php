<style>
  body {
    font-family: Arial, Helvetica, sans-serif;
  }
</style>

<h2>Hello, {{$blogpost->user->name}}!</h2>
<p>Thank you for your new blog post titled as <a href="{{route('blogposts.show', [$blogpost->id])}}">{{$blogpost->blogPostTitle}}:</a>
<hr>
</p>

<p>
  You wrote:
</p>

<p>
  {{$blogpost->blogPostContent}}
  <hr>
</p>

@if($blogpost->image)
  <p>Your uploaded image:</p>
  <p>
    <img src="{{$blogpost->image->url()}}" class="w-50 p-3" alt="blog post image">
  </p>
  <p>The uploaded image is also attached to this email.</p>
@endif

