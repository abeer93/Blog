@if ($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div><br />
@endif
<form method="post" action="{{ route('web.article.create.comment', $article_id) }}">
    <div class="form-group">
        @csrf
        <input type="text" class="form-control" name="content" placeholder="comment" required />
    </div>
    <button type="submit" class="btn btn-primary">Comment</button>
</form> 