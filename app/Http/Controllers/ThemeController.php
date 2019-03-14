<?php

namespace BirdBook\Http\Controllers;

use BirdBook\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:3')->except(['setTheme']);
    }


    public function index()
    {
        $themes = Theme::all();

        return view('themes.index', compact('themes'));
    }


    public function create(Theme $theme)
    {
        return view('themes.create', compact('theme'));
    }


    public function store(Request $request)
    {
        $theme = new Theme([
            'name' => $request->input('name'),
            'cdn_url' => $request->input('cdn_url'),
            'description' => $request->input('description'),
            'created_by' => Auth::id()
        ]);

        if($request->input('is_default') == 1)
        {
            $otherThemes = Theme::all();

            foreach($otherThemes as $otherTheme)
            {
                if ($otherTheme->is_default == 1)
                {
                    $otherTheme->is_default = 0;
                    $otherTheme->save();
                }
            }
            $theme->is_default = 1;
        }

        $theme->save();

        return redirect('/admin/themes')->with('message', 'Theme successfully created');
    }


    public function edit(Theme $theme)
    {
        return view('themes.edit', compact('theme'));
    }


    public function update(Request $request, Theme $theme)
    {
        $this->validate(request(), [
            'name' => 'required|min:2',
            'cdn_url' => 'required|min:10',
            'description' => 'required'
        ]);

        $theme->name = $request->input('name');
        $theme->cdn_url = $request->input('cdn_url');
        $theme->description = $request->input('description');

        if ($request->input('is_default') == 1)
        {
            $theme->is_default = 1;

            $otherThemes = Theme::all();

            foreach($otherThemes as $otherTheme)
            {
                if ($otherTheme->is_default == 1)
                {
                    $otherTheme->is_default = 0;
                    $otherTheme->save();
                }
            }
        }

        $theme->last_updated_by = Auth::id();

        $theme->save();

        return redirect('/admin/themes')->with('message', 'Theme successfully updated');;
    }

    /**
     * Remove the specified resource from stotryirage.
     *
     * @param  \BirdBook\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        if($theme->is_default != 1)
        {
            $theme->delete();
        }

        return redirect()->back()->with('message', 'Theme successfully deleted');;
    }

    public function setTheme(Request $request)
    {
        $theme = $request->input('myTheme');

        if(isset($_COOKIE[Auth::id()])) {
            unset($_COOKIE[Auth::id()]);
        }

        $cookie = cookie(Auth::id(), $theme, 999999, '/');

        return redirect()->back()->cookie($cookie);
    }
}
