<div class="col-sm-2 offset-sm-3">
    <div class="sidebar-module sidebar-module-inset">
        @if (Auth::check())
            <a href="/posts/create"><button style="margin-top:50px" class="btn btn-primary">Create a New Post</button></a>
        @endif
    </div>

    <div class="sidebar-module">

        @if(Auth::check())
            <h4 style="margin-top:50px">Choose a Theme</h4>

            <div class="btn-group">
                <form name="themeForm" method="POST" action="/setTheme">
                    {{ csrf_field() }}
                    <select name="myTheme" onchange="this.form.submit()" >
                        <option value=""> <?php echo $themeName ?> </option>
                        @foreach($themes as $theme)
                            <option value="{{ $theme->cdn_url }}">{{ $theme->name }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        @endif

    </div>

    <div class="sidebar-module">
        <h4 style="margin-top:50px">Elsewhere</h4>
        <ol class="list-unstyled">
            <li><a href="https://laravel.com/docs">Documentation</a></li>
            <li><a href="https://laracasts.com">Laracasts</a></li>
            <li><a href="https://laravel-news.com">News</a></li>
            <li><a href="https://forge.laravel.com">Forge</a></li>
            <li><a href="https://github.com/laravel/laravel">GitHub</a></li>
        </ol>
    </div>
</div><!-- /.blog-sidebar -->