<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Http\Request;

class DayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($event_id)
    {
        $days = Day::where('event_id','=',$event_id)->orderBy('date')->get();
        return view('day.index',compact('days','event_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($event_id)
    {
        return view('day.create',compact('event_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'date' => ['required',
            function ($attribute, $value, $fail) {
                    
                // Checke if name is unique in that room
                $name_exists = Day::where('date', $value)->where('event_id', request()->input('event_id'))->count() > 0;
                if ($name_exists) {
                    $fail('The '.$attribute.' must be unique in this event.');
                }
            }]  
        ]);
        $day = new Day() ;
        $day->name = $this->dateToFrench($request->date , 'l') ;
        $day->date = $request->date ;
        $day->event_id = $request->event_id ;
        $day->save();
        return redirect()->route('day.index',$day->event_id)->withSuccess("");

    }

    /**
     * Display the specified resource.
     */
    public function show(Day $day)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Day $day)
    {
        return view('day.edit',compact('day'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Day $day)
    {
        $request->validate([
            'date' => ['required',
            function ($attribute, $value, $fail) {
                    
                // Checke if name is unique in that room
                $name_exists = Day::where('date', $value)->where('event_id', request()->input('event_id'))->where('id', '!=' , request()->input('id'))->count() > 0;
                if ($name_exists) {
                    $fail('The '.$attribute.' must be unique in this event.');
                }
            }]  
        ]);
        if($day->name !== $request->name){
            try{
                $old = public_path('images/'.$day->event->name.'/themes/'.$day->name);
                $new = public_path('images/'.$day->event->name."/themes/".$this->dateToFrench($request->date , 'l'));
                rename($old , $new);
                $day->name = $this->dateToFrench($request->date , 'l') ;
            }catch(\Exception $e){
                return redirect()->route('day.index',$day->id)->withError($e->getMessage());
            }
        }

        $day->date = $request->date ;
        $day->update();
        return redirect()->route('day.index',$day->event_id)->withSuccess("élément modifier avec succès");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Day $day)
    {
        $days = Day::where('event_id','=',$day->event_id)->orderBy('date')->get();

        $index = 0;
        $length = count($days)-1;
        
        foreach($days as $key=>$valday){
            if($valday->id === $day->id){
                $index = $key ;
            }
        }
        if(count($day->themes)>0){
            return redirect()->route('day.index',$day->event_id)->withWarning("supprimer les thèmes avant de supprimer ce jour !");
        }
        elseif($length === 0 || $length === -1){
            return redirect()->route('day.index',$day->event_id)->withError("doit avoir une journée au moins dans l'événement !");
        }elseif ($index === 0 || $length === $index) {
            if(file_exists(public_path('images/'.$day->event->name.'/themes/'.$day->name))){

                rmdir(public_path('images/'.$day->event->name.'/themes/'.$day->name));
            }
            $day->delete();
            return redirect()->route('day.index',$day->event_id)->withSuccess("élément supprimé avec succès");
        }else{
            return redirect()->route('day.index',$day->event_id)->withError("essayer à nouveau !");
        }
    }

    public function dateToFrench($date, $format) 
    {
        $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
        $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
        return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
    }
}
