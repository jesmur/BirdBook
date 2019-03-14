@extends ('layouts.app')

@section ('content')

    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>

    <div class="col-md-7 col-md-offset-2" id="posts">

        <h1>{{ $user->name }}'s Favourite Posts</h1>

        @forelse($posts as $post)
            @include('posts.post')
        @empty
            <h2 align="center">You have not favourited any posts!</h2>
        @endforelse

    </div>

    @include ('layouts.sidebar')

@endsection