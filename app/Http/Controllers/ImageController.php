<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Image;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ModelImage;
use File;

class ImageController extends Controller
{
    public function event_image_show($event_id)
    {
        $event = Event::find($event_id);
        return view('image.show',compact('event'));
    }

    public function event_image($event_id)
    {
        return view('image.create',compact('event_id'));
    }

    public function event_image_store(Request $request , $event_id)
    {
        $request->validate([
            'images' => 'required',
            'images.*' => 'required|mimes:png,jpg,jpeg',
        ]);
        
        $event = Event::find($event_id);


        $path = public_path('images/'.$event->name.'/images/');

        if(!file_exists($path.'low/')){
            mkdir($path.'low/', 0770, true);
        }
        $index = $this->countFiles($path.'low/');
        if ($request->file('images')){
            foreach($request->file('images') as $file)
            {
                $file_name = 'img ('.$index.').jpg';  
                $image = new Image() ;
                ModelImage::make($file->getRealPath())->resize(400, 300)->save($path.'low/'.$file_name);
                $file->move($path.'high/', $file_name);
                $image->image = $file_name;
                $image->event_id = $event_id;
                $image->save();
                $index ++ ;

            }
        }

        return redirect()->route('event-image-show',$event_id)->withSuccess("les éléments a été ajouté avec succès");
    
    }

    public function event_image_destroy(Event $event)
    {
        foreach($event->images as $image){
            $path_high = public_path('images/'.$event->name.'/images/high/'.$image->image);
            $path_low = public_path('images/'.$event->name.'/images/low/'.$image->image);
    
            if(file_exists($path_high)){
                unlink($path_high);
            }
            if(file_exists($path_low)){
                unlink($path_low);
            }
    
            $image->delete();
        }

        return redirect()->back()->withSuccess('les éléments a été supprimer avec succès');
    }
    public function countFiles($directory) 
    {
        $files = File::files($directory);
        $countFiles = 0;
        if ($files !== false) {
            $countFiles = count($files);
        } 
        return $countFiles;

    }
}
