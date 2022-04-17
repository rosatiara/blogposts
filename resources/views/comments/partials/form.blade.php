<label for="comment" class="form-label">Comment content</label>
<input type="text" name="commentContent" id="comment" placeholder="Comment" class="form-control"
    value="{{ old('commentContent', optional($comment ?? null)->commentContent) }}"></input>
<p class="text-muted">Please insert the comment content</p>
@if ($errors->any())
    <div class="mb-3">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
