@if($user->hasRole(1) || $user->hasRole(2) || $user->hasRole(3))
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            <a href="/admin/users/{{$user->id}}/edit"><button class="btn btn-warning">Edit</button></a>
        </td>
        @if($user->id != 1)
            <td>
                <form action="/admin/users/{{$user->id}}/destroy" method="delete">
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete user?')">Delete</button>
                </form>
            </td>
        @endif
    </tr>
@endif