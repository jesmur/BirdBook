{{--<div class="col-md-7 col-md-offset-2">--}}

    {{--<h1 class="post-title">{{ $post->title }} </h1>--}}

    {{--<p class="post-meta">--}}
        {{--{{ $post->user->name }} on--}}
        {{--{{ $post->created_at->toFormattedDateString() }}--}}
    {{--</p>--}}

    {{--@if($post->image != null)--}}
        {{--<div>--}}
            {{--<img src="{{ asset('images/'.$post->image) }}" style="margin-bottom:50px" />--}}
        {{--</div>--}}
    {{--@endif--}}

    {{--<br>--}}
    {{--<p>{{ $post->body }}</p>--}}

    {{--@if(Auth::check())--}}
        {{--@if(Auth::user()->hasRole(2))--}}
            {{--<form action="/admin/posts/{{$post->id}}/destroy" method="post">--}}
                {{--{{ csrf_field() }}--}}
                {{--{{ method_field('DELETE') }}--}}
                {{--<button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete Post</button>--}}
            {{--</form>--}}
        {{--@endif--}}
    {{--@endif--}}

{{--</div>--}}