@extends ('layouts.app')

@section ('content')


    <div class="col-md-8 col-md-offset-2">

        <h2>Theme Management</h2>
        <hr>

        <form action='/admin/themes/create'>
            <div class="form-group">
                <div class="button">
                    <button type="submit" class="btn btn-primary">Create New Theme</button>
                </div>
            </div>
        </form>

        <table class="table">
            <thead>
            <tr>
                <th scope="col" style="text-align:center" ><h4>ID</h4></th>
                <th scope="col" style="text-align:center" ><h4>Name</h4></th>
                <th scope="col" style="text-align:center" ><h4>CDN URL</h4></th>
                <th scope="col" style="text-align:center" ><h4>Description</h4></th>
                <th scope="col" style="text-align:center" ><h4>Default</h4></th>
                <th scope="colgroup" colspan="2" style="text-align:center"><h4>Actions</h4></th>
            </tr>
            </thead>
            <tbody>
                @foreach($themes as $theme)
                    <tr>
                        <td>{{ $theme->id }}</td>
                        <td>{{ $theme->name }}</td>
                        <td>{{ $theme->cdn_url }}</td>
                        <td>{{ $theme->description }}</td>
                        <td>
                            @if($theme->is_default == 1)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                        <td>
                            <a href="/admin/themes/{{$theme->id}}/edit"><button class="btn btn-warning">Edit</button></a>
                        </td>
                        <td>
                            <a href="/admin/themes/{{$theme->id}}/destroy">
                                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete theme?')"
                                @if($theme->is_default == 1)
                                    disabled
                                @endif
                                >Delete</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <nav class="pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

    </div>

@endsection