<label for="authorName" class="form-label">Author Name</label>
<input type="text" name="authorName" id="name" placeholder="Name" class="form-control"value="{{old('name',optional($author??null)->authorName)}}" > </input>
<p class="text-muted">Please insert the name of the Author</p>
<label for="authorEmail" class="form-label">Author Email</label>
<input type="text" name="authorEmail" id="email" placeholder="Email" class="form-control"value="{{old('email',optional($author??null)->authorEmail)}}" > </input>
<p class="text-muted">Please insert the email of the Author</p>
@if ($errors->any())
    <div class="mb-3">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
