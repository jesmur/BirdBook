<div class="col-md-9 col-md-offset-1">

    <a href="/posts/{{ $post->id }}">
        <h2 class="post-title">{{ $post->title }}</h2>
    </a>

    <p style="margin-bottom:15px" >
        Posted by {{ $post->user->name }} on
        {{ $post->created_at->toFormattedDateString() }}
    </p>

    @if($post->image != null)
        <img src="{{ asset('images/'.$post->image) }} " style="margin-bottom:20px" />
    @endif

    <p>
        {{ $post->body }}
    </p>

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