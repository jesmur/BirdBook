<?php

namespace BirdBook\Http\Controllers;

use BirdBook\User;
use BirdBook\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:1')->except(['userFavourites', 'show']);
    }

    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        $posts = Post::where('created_by', '=', $user->id)->latest()->get();

        $myPosts = true;

        return view('posts.index', compact('posts', 'myPosts', 'user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function search()
    {
        $searchTerm = Input::get('searchTerm');
        $users = User::where('name', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('email', 'LIKE', '%' . $searchTerm . '%')->get();

        return view('users.index', compact('users', 'searchTerm'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required'
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->input('user_administrator') == true)
        {
            if(!$user->hasRole(1))
            {
                $user->roles()->attach(1);
            }
        }
        else
        {
            $role = DB::table('roles')->where('id', '1')->first();
            if($user->id != 1) {
                $user->roles()->detach($role);
            }
        }

        if ($request->input('post_moderator') == true)
        {
            if(!$user->hasRole(2))
            {
                $user->roles()->attach(2);
            }
        }
        else
        {
            $role = DB::table('roles')->where('id', '2')->first();
            if($user->id != 1) {
                $user->roles()->detach($role);
            }
        }

        if ($request->input('theme_manager') == true)
        {
            if(!$user->hasRole(3))
            {
                $user->roles()->attach(3);
            }
        }
        else
        {
            $role = DB::table('roles')->where('id', '3')->first();
            if($user->id != 1) {
                $user->roles()->detach($role);
            }
        }

        $user->last_updated_by = Auth::id();

        $user->save();

        return redirect('/admin/users')->with('message', 'User successfully updated');
    }

    public function destroy(User $user)
    {
        if($user != null && $user->id != 1)
        {
            DB::table('users')->where('id', $user->id)->update(array('deleted_by' => Auth::user()->id));

            $user->delete();

            return redirect('/admin/users')->with('message', 'User successfully deleted');

        }
        return redirect('/admin/users');
    }

    public function userFavourites(User $user)
    {
        if (Auth::id() == $user->id) {

            $posts = $user->favourites()->orderByDesc('updated_at')->get();

            return view('posts.favourites', compact('posts', 'user'));
        }

        return redirect()->back()->with('warning', 'Unauthorized access');
    }

}










