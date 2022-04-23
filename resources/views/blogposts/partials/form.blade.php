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
    <label for="blogPostHighlight">Highlight Blog Post</label>
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
