@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="container">
        <div class="container-fluid">
            <form method="get" action="{{ route('web.articles.index') }}">
                <div class="row">
                    <div class="col-md-10">
                        <select class="form-control" name="category_id">
                            <option>Select category</option>
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>
        </div><br />
        @foreach($articles as $article)
            <div class="container-fluid">
                <h1>{{$article->title}}</h1>
                <p>{{$article->content}}</p>
                <img src="{{ asset('images/'.$article->image) }}" style="width:350px; height:150px">
                <hr />
                <div class="container-fluid">
                    <h3>{{$article->comments_count}} Comments</h3>
                    @foreach($article->comments as $comment)
                        <p>{{$comment->content}}</p>
                    @endforeach
                    @include('app/web.articles.comments.create', ['article_id' => $article->id])
                </div>
            </div>
        @endforeach
    </div>
    <hr />
@stop