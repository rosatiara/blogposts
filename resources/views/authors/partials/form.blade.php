<div class="mb-3">
    <label for="authorName" class="form-label">Author Name</label>
    <input type="text" class="form-control" name="authorName" id="authorName" value = "{{old('authorName', optional($author ?? null)->authorName)}}" aria-describedby="authorNameHelp">
    <div id="authorName" class="form-text">Please insert the name of the author</div>
</div>
<div class="mb-3">
    <label for="authorEmail" class="form-label">Author Email</label>
    <input type="email" class="form-control" name="authorEmail" id="authorEmail" value = "{{old('authorEmail', optional($author->profile ?? null)->authorEmail)}}" aria-describedby="authorEmailHelp">
    <div id="authorEmail" class="form-text">Please insert the Email-Address of the author</div>
</div>
@if($errors->any())
    <div class="mb-3">
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif



