@extends('adminlte::page')

@section('title', 'Articles')

@section('content_header')
    <h1>Articles</h1>
@stop

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="container">
        @foreach($articles as $article)
            <div class="container-fluid">
                <h1>{{$article->title}}</h1>
                <h5>{{$article->category->name}}</h5>
                <p>{{$article->content}}</p>
                <img src="{{ asset('images/'.$article->image) }}" style="width:350px; height:150px">
                <hr />
                <div class="container-fluid">
                    <h3>{{$article->comments_count}} Comments</h3>
                    @foreach($article->comments as $comment)
                        <p>{{$comment->content}}</p>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <hr />
@stop