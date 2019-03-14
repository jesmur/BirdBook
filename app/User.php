<?php

namespace BirdBook;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'created_by');
    }

    public function publish(Post $post)
    {
        $this->posts()->save($post);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        return null !== $this->roles()->where('id', $role)->first();
    }

    public function favourites()
    {
        return $this->belongsToMany(Post::class, 'favourites', 'user_id', 'post_id');
    }

    public function hasFav($post)
    {
        return ! is_null(
            DB::table('favourites')
                ->where('user_id', $this->id)
                ->where('post_id', $post->id)
                ->first()
        );
    }

}
