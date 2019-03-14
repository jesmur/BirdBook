@extends ('layouts.app')

@section ('content')

    <div class="col-md-8 col-md-offset-2">
        <h2>User Management</h2>
        <hr>
    </div>

    @include('users.search')

    <div class="col-md-8 col-md-offset-2">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col"><h4>ID</h4></th>
                    <th scope="col"style="text-align: center" ><h4>Name</h4></th>
                    <th scope="col"style="text-align: center" ><h4>Email</h4></th>
                    <th scope="colgroup" colspan="2" style="text-align:center">Actions</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($searchTerm) && $searchTerm != "")
                @foreach($users as $user)
                    @include('users.results')
                @endforeach
            @elseif(!isset($searchTerm) || $searchTerm == "")
                @foreach($users as $user)
                    @include('users.all')
                @endforeach
            @endif
            </tbody>
        </table>

        <nav class="pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

    </div>

@endsection