<?php

namespace BirdBook\Http\Controllers;

use Carbon\Carbon;
use BirdBook\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    private $lastPost;

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show', 'poll']);
    }


    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required',
            'image' => 'image'
        ]);

        if($request->file('image') != null) {
            $image = $request->file('image');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move(@$destinationPath, $input['imagename']);

            Post::create([
                'title' => request('title'),
                'body' => request('body'),
                'created_by' => Auth::id(),
                'image' => $input['imagename']
            ]);
        }
        else {
            Post::create([
                'title' => request('title'),
                'body' => request('body'),
                'created_by' => Auth::id()
            ]);
        }

        return redirect('/')->with('message', 'Post successfully created');
    }


    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }


    public function destroy(Post $post)
    {
        DB::table('posts')->where('id', $post->id)->update(array('deleted_by' => Auth::id()));
        $post->delete();

        return redirect()->back()->with('message', 'Post deleted successfully');
    }

    public function poll(Request $request)
    {
        if($request->has('ts')){
            $ts = (int)$request->input('ts');
            $ts = intval($ts / 1000);

            $stringTimeStamp = Carbon::createFromTimestamp($ts)->toDateTimeString();

            if($this->lastPost == null) {
                $post = Post::where('created_at', '>', $stringTimeStamp)->first();
            }
            else{
                $post = Post::where('created_at', '>', $stringTimeStamp)
                    ->where('created_at', '>', $this->lastPost)->first();
            }

            if($post != null) {
                $this->lastPost = $stringTimeStamp;
                return view('posts.post', compact('post'));
            }

            return null;
        }
    }

    public function addFavourite(Post $post)
    {
        Auth::user()->favourites()->attach($post->id);
        DB::table('favourites')->where('post_id', $post->id)->where('user_id', Auth::id())->update(array('updated_at' => Carbon::now()));

        return back();
    }

    public function removeFavourite(Post $post)
    {
        Auth::user()->favourites()->detach($post->id);

        return back();
    }
}
