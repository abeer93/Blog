@extends('adminlte::page')

@section('title', 'Articles')

@section('content_header')
    <h1>Add Article</h1>
@stop

@section('content')
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('articles.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="name">Title:</label>
              <input type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group">
              <label for="price">Content :</label>
              <textarea class="form-control" name="content"></textarea>
          </div><div class="form-group">
              <label for="name">Category:</label>
              <select class="form-control" name="category_id">
                  <option>Select category</option>
                  @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="price">Image :</label>
              <input type="file" class="form-control" name="image" />
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@stop