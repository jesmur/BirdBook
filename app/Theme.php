<?php

namespace BirdBook;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'name', 'cdn_url', 'description', 'is_default', 'created_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public static function getTheme()
    {
        $theme = DB::table('themes')->where('is_default','=',1)->first();

        return $theme->cdn_url;
    }

    public static function getDefaultThemeName()
    {
        $theme = DB::table('themes')->where('is_default','=',1)->first();

        return $theme->name;
    }

    public static function themes()
    {
        $themes = Theme::all();
        return $themes;
    }

    public static function setTheme(Theme $theme)
    {
        $newTheme = DB::table('themes')->where('id', $theme->id)->first();

        return $newTheme->cdn_url;
    }
}
