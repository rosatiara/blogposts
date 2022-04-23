{{-- Blog Post Title --}}
<label for="blogPostTitle" class="form-label">Blog post Title</label>
<input type="text" name="blogPostTitle" id="title" placeholder="Title" class="form-control"
    value="{{ old('blogPostTitle', optional($post ?? null)->blogPostTitle) }}"></input>
<p class="text-muted">Please insert the title of the Blog Post</p>
{{-- Blog Post Content --}}
<label for="blogPostContent" class="form-label">Blog post Body</label>
<input name="blogPostContent" id="body" class="form-control" placeholder="Body"
    value="{{ old('blogPostContent', optional($post ?? null)->blogPostContent) }}""></input>
            <p class="   text-muted">Please insert the body of the Blog Post</p>
{{-- Blog Post Highlight --}}
<div class="mb-3">
    <input type="checkbox" name="blogPostHighlight" id="blogPostHighlight" {{old('blogPostHighlight',optional($post??null)->blogPostIsHighLight?"checked":"")}}></input>
    <label form="form-check-label" for="blogPostHighlight">Highlight Blog Post</label>
</div>
{{-- Blog Post Image --}}
<div class="mb-3">
    <label for="blogPostImage" class="form-label">Blog Post Image</label>
    @if(optional($blogpost ?? null)->image)
        <div class="d-flex align-items-center bg-light">
            <img src="{{$blogpost->image->url()}}" class="w-25 p-3" alt="Blog Post Image">
        </div>
    @endif
    <br>
    <input type="file" class="form-control-file" name="blogPostImage" id="blogPostImage" aria-describedby="blogPostImageHelp">
    <div id="blogPostImage" class="form-text">Please choose an image file for the Blog Post</div>
</div>
@if ($errors->any())
    <div class="mb-3">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
