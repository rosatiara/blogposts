@section('content')
  <h1>Create a new blog post</h1>
  <form action="{{ route('blogposts.store') }}" method="POST"></form>
  @csrf
  <div class="mb-3">
    <label for="blogPostTitle" class="form-label">Blog Post Title</label>
    <input type="text" class="form-control" name="blogPostTitle">
  </div>