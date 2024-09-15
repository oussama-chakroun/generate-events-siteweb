<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Event;
use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($day_id)
    {
        $themes = Theme::where('day_id' , $day_id)->get();
        $event_id = Day::find($day_id)->event->id;
        return view('theme.index', compact('themes','event_id','day_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($day_id)
    {
        $day = Day::find($day_id);
        $event_id = $day->event->id;
        return view('theme.create',compact('day_id','event_id')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "video_url"    => "required|array|min:1",
            "video_url.*"  => ["required","string","distinct","min:1", "regex:(https://www.youtube.com/embed/)"],
            'image' => 'required|array|min:1',
            'image.*' => 'required|mimes:jpg,jpeg,png|min:1'
        ]);

        $day = Day::find($request->day_id);
        
        foreach( $request->video_url as $key=>$value  ){
            if(isset($request->file('image')[$key])){
                $theme = new Theme() ;
                $file = $request->file('image')[$key] ;
                $file_name = time().rand(1,100000).'.'.$file->extension();  
                $file->move(public_path('images/'.$day->event->name.'/themes/'.$day->name), $file_name);
                $theme->image = $file_name;
                $theme->video_url = $value;
                $theme->day_id = $day->id;
                if(isset($request->path_video[$key])){
                    $theme->path_video = $request->path_video[$key];
                }
                $theme->save();
            }
        }
        return redirect()->route('day.index' , $day->event->id)->withSuccess("élément ajouté avec succès");
    }

    /**
     * Display the specified resource.
     */
    public function show(Theme $theme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theme $theme)
    {
        return view('theme.edit',compact('theme'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Theme $theme)
    {
        $request->validate([
            "video_url"  => ["required","string","distinct","min:1", "regex:(https://www.youtube.com/embed/)"],
            'image' => 'nullable|mimes:jpg,jpeg,png|min:1'
        ]);
        
        if($request->image){
            $file = $request->image ;
            $file->move(public_path('images/'.$theme->day->event->name.'/themes/'.$theme->day->name), $theme->image);

        }
        $theme->video_url = $request->video_url;
        if(isset($request->path_video)){
            $theme->path_video = $request->path_video;
        }
        $theme->update();
        return redirect()->route('theme.index',$theme->day->id)->withSuccess('élément modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theme $theme)
    {
        $path = public_path('images/'.$theme->day->event->name.'/themes/'.$theme->day->name.'/'.$theme->image);

        if(file_exists($path)){
            unlink($path);
        }
        $theme->delete();
        return redirect()->back()->withSuccess('élément supprimer avec succès');
    }
}
