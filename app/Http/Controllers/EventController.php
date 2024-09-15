<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Event;
use App\Models\Programme;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use ZipArchive;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::paginate(10);
        return view("event.index" , compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("event.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:events,name' ,
            'primary_color' => 'required|notIn:#000000' ,
            'secendary_color' => 'required|notIn:#000000' ,
            'thumbnail_pc' => 'required' ,
            'thumbnail_mobile' => 'required' ,
            'btn_acc' => 'required' ,
            'btn_pro' => 'required' ,
            'btn_red' => 'required' ,
            'btn_epo' => 'required' ,
            'header' => 'required' ,
            'start_date' => 'required' ,
            'end_date' => 'required' ,
            'btn_x_pc' => 'required' ,
            'btn_y_pc' => 'required' ,
            'btn_x_mobile' => 'required' ,
            'btn_y_mobile' => 'required' ,
            

        ]);
        

        $thumbnail_pc = '1.jpg';  
        $request->thumbnail_pc->move(public_path('images/'.$request->name.'/'.'background'), $thumbnail_pc);

        $thumbnail_mobile = '2.jpg';  
        $request->thumbnail_mobile->move(public_path('images/'.$request->name.'/'.'background'), $thumbnail_mobile);
        
        $header = 'header.jpg';  
        $request->header->move(public_path('images/'.$request->name.'/'.'background'), $header);        

        $btn_acc = 'acc.png';  
        $request->btn_acc->move(public_path('images/'.$request->name.'/'.'btn'), $btn_acc);

        $btn_pro = 'pro.png';
        $request->btn_pro->move(public_path('images/'.$request->name.'/'.'btn'), $btn_pro);

        $btn_red = 'red.png';  
        $request->btn_red->move(public_path('images/'.$request->name.'/'.'btn'), $btn_red);

        $btn_epo = 'epo.png';  
        $request->btn_epo->move(public_path('images/'.$request->name.'/'.'btn'), $btn_epo);

        

        $event = new Event() ;
        $event->name = $request->name ;
        $event->thumbnail_pc = $thumbnail_pc ;
        $event->thumbnail_mobile = $thumbnail_mobile ;
        $event->header = $header ;
        if($request->logo){
            $logo = 'logo.png';  
            $request->logo->move(public_path('images/'.$request->name.'/'.'background'), $logo);
            $event->logo = $logo ;
        }
        $event->primary_color = $request->primary_color ;
        $event->secendary_color = $request->secendary_color ;
        $event->btn_acc = $btn_acc ;
        $event->btn_pro = $btn_pro ;
        $event->btn_red = $btn_red ;
        $event->btn_epo = $btn_epo ;
        
        $event->btn_x_pc = $request->btn_x_pc;
        $event->btn_y_pc = $request->btn_y_pc;
        $event->btn_x_mobile = $request->btn_x_mobile;
        $event->btn_y_mobile = $request->btn_y_mobile;


        $event->save();

        $dates = $this->getBetweenDates($request->start_date , $request->end_date);
        
        foreach($dates as $date) {
            $day = new Day() ;
            $day->name = $this->dateToFrench($date , 'l') ;
            $day->date = $date ;
            $day->event_id = $event->id ;
            $day->save();
        }

        return redirect()->route('event.index')->withSuccess('l\'événement a été créé avec succès');

    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return file_get_contents(storage_path('projects/'.$event->name.'/index.html'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('event.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|unique:events,name,'.$event->id,
            'primary_color' => 'required|notIn:#000000' ,
            'secendary_color' => 'required|notIn:#000000' ,
            'btn_x_pc' => 'required' ,
            'btn_y_pc' => 'required' ,
            'btn_x_mobile' => 'required' ,
            'btn_y_mobile' => 'required' 
        ]);
        if($event->name !== $request->name){
            try{
                $old = public_path('images/'.$event->name);
                $new = public_path('images/'.$request->name);
                rename($old , $new);
                $event->name = $request->name;
            }catch(\Exception $e){
                return redirect()->route('event.index')->withError($e->getMessage());
            }
        }
        
        $event->primary_color = $request->primary_color;
        $event->secendary_color = $request->secendary_color;
        $event->btn_x_pc = $request->btn_x_pc;
        $event->btn_y_pc = $request->btn_y_pc;
        $event->btn_x_mobile = $request->btn_x_mobile;
        $event->btn_y_mobile = $request->btn_y_mobile;

        $btn_path = public_path('images/'.$event->name.'/btn/');
        $background_path = public_path('images/'.$event->name.'/background/');

        // background images

        if($request->logo){
            $logo = 'logo.png';  
            $request->logo->move($background_path, $logo);
            Image::make($request->logo->getRealPath())->resize(300, 200)->save($background_path.$logo);
            $event->logo = $logo;
        }
        if($request->header){
            $header = $event->header ;
            $request->header->move($background_path, $header);
        }

        if($request->thumbnail_pc){
            $thumbnail_pc = $event->thumbnail_pc ;
            $request->thumbnail_pc->move($background_path, $thumbnail_pc);
        }

        if($request->thumbnail_mobile){
            $thumbnail_mobile = $event->thumbnail_mobile ;
            $request->thumbnail_mobile->move($background_path, $thumbnail_mobile);
        }

        // btn images

        if($request->btn_acc){
            $btn_acc = $event->btn_acc ;
            $request->btn_acc->move($btn_path, $btn_acc);
        }
        if($request->btn_epo){
            $btn_epo = $event->btn_epo ;
            $request->btn_epo->move($btn_path, $btn_epo);
        }
        if($request->btn_pro){
            $btn_pro = $event->btn_pro ;
            $request->btn_pro->move($btn_path, $btn_pro);
        }
        if($request->btn_red){
            $btn_red = $event->btn_red ;
            $request->btn_red->move($btn_path, $btn_red);
        }

        $event->update();

        return redirect()->route('event.index')->withSuccess('l\'événement a été créé avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }

    public function dateToFrench($date, $format) 
    {
        $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
        $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
        return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
    }

    public function getBetweenDates($startDate, $endDate)

    {

        $rangArray = [];

        $startDate = strtotime($startDate);

        $endDate = strtotime($endDate);

        for ($currentDate = $startDate; $currentDate <= $endDate; $currentDate += (86400)) {

            $date = date('Y-m-d', $currentDate);

            $rangArray[] = $date;

        }
        return $rangArray;

    }
    

    function copyFolder($source, $destination) {
        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }
    
        $dir = opendir($source);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($source . '/' . $file)) {
                    $this->copyFolder($source . '/' . $file, $destination . '/' . $file);
                } else {
                    copy($source . '/' . $file, $destination . '/' . $file);
                }
            }
        }
        closedir($dir);
    }
   public function write_at_right_place($content , $line){
        $filename = '/home/'.get_current_user().'/Desktop/test.html';
        $line_i_am_looking_for = $line;
        $lines = file( $filename , FILE_IGNORE_NEW_LINES );
        $lines[$line_i_am_looking_for] = $content;
        file_put_contents( $filename , implode( "\n", $lines ) );
   }
  
   function zip_folder ($input_folder, $output_zip_file) {
    $zipClass = new ZipArchive();
    $input_folder = realpath($input_folder);
    $addDirDo = static function($input_folder, $name) use ($zipClass, &$addDirDo ) {
        $name .= '/';
        $input_folder .= '/';
        // Read all Files in Dir
        $dir = opendir ($input_folder);
        while ($item = readdir($dir))    {
            if ($item == '.' || $item == '..') continue;
            $itemPath = $input_folder . $item;
            if (filetype($itemPath) == 'dir') {
                $zipClass->addEmptyDir($name . $item);
                $addDirDo($input_folder . $item, $name . $item);
            } else {
                $zipClass->addFile($itemPath, $name . $item);
            }
        }
    };
    if($input_folder !== false && $output_zip_file !== false)
    {
        $res = $zipClass->open($output_zip_file, \ZipArchive::CREATE);
        if($res === true)   {
            $zipClass->addEmptyDir(basename($input_folder));
            $addDirDo($input_folder, basename($input_folder));
            $zipClass->close(); 
        }
        else   { exit ('Could not create a zip archive, migth be write permissions or other reason.'); }
    }
}

    function download_zip_file(Event $event){
        $file = storage_path('projects/'.$event->name.'/'.$event->name.'.zip');
        $input = storage_path('projects/'.$event->name);
        if (file_exists($file)) {
            // Set headers
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Content-Length: ' . filesize($file));

            // Read and output the file content
            readfile($file);

            return redirect()->route('event.index')->withSuccess("");
        }elseif(file_exists($input)){
            $this->zip_folder($input,$file);
            $this->download_zip_file($event);
        } 
        else {
            return redirect()->route('event.index')->withWarning("générer le code source avant d'avoir été téléchargé !");
        }

    }

}
