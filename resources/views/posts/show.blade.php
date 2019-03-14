@extends('layouts.app')

@section ('content')

    <div class="col-md-7 col-md-offset-2">

        <h1 class="post-title">{{ $post->title }} </h1>

        <p class="post-meta">
            {{ $post->user->name }} on
            {{ $post->created_at->toFormattedDateString() }}
        </p>

        @if($post->image != null)
            <div>
                <img src="{{ asset('images/'.$post->image) }}" style="margin-bottom:50px" />
            </div>
        @endif

        <br>
        <p>{{ $post->body }}</p>

        <div class = "row">
            <div class = "col-md-6">
                @if (Auth::check())
                    @if(!Auth::user()->hasFav($post))
                        <form class="form" method="POST" action='/{{$post->id}}/addFav'>
                            <div class="form-group">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-light">Favourite <span class="glyphicon glyphicon-heart"></span></button>
                            </div>
                        </form>
                    @elseif(Auth::user()->hasFav($post))
                        <form class="form" method="POST" action='/{{$post->id}}/unFav'>
                            <div class="form-group">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-dark">Unfavourite <span class="glyphicon glyphicon-remove"></span></button>
                            </div>
                        </form>
                    @endif
                @endif
            </div>
            <div class = "col-md-6">
                @if(Auth::check())
                    @if(Auth::user()->hasRole(2))
                        <form action="/admin/posts/{{$post->id}}/destroy" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger pull-right" onclick="return confirm('Are you sure you want to delete this post?')">Delete Post</button>
                        </form>
                    @endif
                @endif
            </div>
        </div>

    </div>

    @include('layouts.sidebar')

@endsection