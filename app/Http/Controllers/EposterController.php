<?php

namespace App\Http\Controllers;

use App\Models\Eposter;
use App\Models\Event;
use Illuminate\Http\Request;

class EposterController extends Controller
{
    public function event_eposter_show($event_id)
    {
        $event = Event::find($event_id);
        return view('eposter.show',compact('event'));
    }

    public function event_eposter($event_id)
    {
        return view('eposter.create',compact('event_id'));
    }

    public function event_eposter_store(Request $request , $event_id)
    {
        $request->validate([
            "name"    => "required|array|min:1",
            "name.*"  => "required|string|distinct|min:1",
            'pdf' => 'required|array|min:1',
            'pdf.*' => 'required|mimes:pdf|min:1',
        ]);
        $event = Event::find($event_id);
        
        foreach( $request->name as $key=>$value  ){
            if(isset($request->file('pdf')[$key])){
                $eposter = new Eposter() ;
                $file = $request->file('pdf')[$key] ;
                $file_name = time().rand(1,100000).'.'.$file->extension();  
                    $file->move(public_path('images/'.$event->name.'/eposter'), $file_name);
                $eposter->pdf = $file_name;
                $eposter->name = $value;
                $eposter->event_id = $event_id;
                $eposter->save();
            }
        }

        return redirect()->route('event-eposter-show',$event_id)->withSuccess("élément ajouté avec succès");
    
    }

    public function event_eposter_destroy(Request $request , $event_id)
    {
        $event = Event::find($event_id);
        if($request->to_delete){
            foreach($request->to_delete as $eposter_id){
                $eposter = Eposter::findOrFail($eposter_id);
                $path = public_path('images/'.$event->name.'/eposter/'.$eposter->pdf);
                if(file_exists($path)){
                    unlink($path);
                }
                $eposter->delete();
            }
            return redirect()->route('event-eposter-show',$event_id)->withSuccess("élément supprimé avec succès") ;
        }
        else{
            return redirect()->route('event-eposter-show',$event_id)->withError("rien de sélectionné à supprimer") ;
        }
        
    }
}
