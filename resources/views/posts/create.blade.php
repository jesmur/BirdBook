@extends('layouts.app')

@section('content')

    <div class="col-sm-6 col-md-offset-2">
        <h1>Create a New Post</h1>

        <hr>

        <form method="POST" action="/posts/store" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{  old('title') }}">
            </div>
            <div class="form-group">
                <label for="body">Body:</label>
                <textarea id="body" name="body" class="form-control">{{  old('body') }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Picture:</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>

        @include('layouts.errors')

    </div>

    @include('layouts.sidebar')

@endsection