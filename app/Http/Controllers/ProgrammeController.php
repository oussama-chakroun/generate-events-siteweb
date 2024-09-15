<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    public function event_programme_show($event_id)
    {
        $event = Event::find($event_id);
        return view('programme.show',compact('event'));
    }

    public function event_programme($event_id)
    {
        return view('programme.create',compact('event_id'));
    }

    public function event_programme_store(Request $request , $event_id)
    {
        $request->validate([
            'images' => 'required',
            'images.*' => 'required|mimes:png,jpg,jpeg',
        ]);
        $event = Event::find($event_id);
        if ($request->file('images')){
            foreach($request->file('images') as $key => $file)
            {
                $programme = new Programme() ;
                $file_name = time().rand(1,100000).'.'.$file->extension();  
                $file->move(public_path('images/'.$event->name.'/programme'), $file_name);
                $programme->image = $file_name;
                $programme->event_id = $event_id;
                $programme->save();
            }
        }

        return redirect()->route('event-programme-show',$event_id)->withSuccess("élément ajouté avec succès");
    
    }

    public function event_programme_destroy(Programme $programme)
    {
        $path = public_path('images/'.$programme->event->name.'/programme/'.$programme->image);

        if(file_exists($path)){
            unlink($path);
        }
        $programme->delete();
        return redirect()->back()->withSuccess('élément supprimer avec succès');
    }
}
