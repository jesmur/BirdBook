@extends ('layouts.app')

@section ('content')

    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>

    <script>
        var timeStamp = Date.now();

        function doPoll(){

            $.ajax({
                url:'http://localhost:8000/posts/poll?ts=' + timeStamp,
                success: function(result){

                    if(result != null) {
                        $("#posts").eq(0).prepend($.parseHTML(result));
                        timeStamp = Date.now();
                    }

                    setTimeout(doPoll, 1000);
                }

            })
        }
        setTimeout(doPoll, 1000);
    </script>

    <div class="col-md-7 col-md-offset-2" id="posts">

        @if(isset($myPosts))
            <h1>{{ $user->name }}'s Posts</h1>
            @endif

        @forelse($posts as $post)
            @include('posts.post')
        @empty
            <h2 align="center">There are no posts to show!</h2>
        @endforelse

    </div>

    @include ('layouts.sidebar')

@endsection