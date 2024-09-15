<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use ZipArchive;

class GenerateCode extends Component
{
    public $event , $disabled = true ;
    public $errors = [] ;
    public $progress = 0 , $cur_progress = 0;


    public function render()
    {
        return view('livewire.generate-code');
    }

    public function generate(){
        if(file_exists(storage_path('template/demo'))){
            $old = storage_path('template/demo') ;
            $this->errors['path_demo'] = false ;
        }elseif(file_exists(storage_path('template/demo-backup'))) {
            $old = storage_path('template/demo-backup') ;
            $this->errors['path_demo'] = false ;
        }else{
            $this->errors['path_demo'] = true ;
        }

        $new = storage_path('projects/'.$this->event->name);

        if(file_exists($new)){
            $this->removeFolder($new) ;
        }
        if(!$this->errors['path_demo']){
            $this->errors['path_demo_destination'] = false;
            $this->copyFolder($old , $new);
            $this->progress = 20 ;
        }else{
            $this->errors['path_demo_destination'] = true;
        }


        if(!$this->errors['path_demo_destination'] and !$this->errors['path_demo']){
            $path_img = storage_path('projects/'.$this->event->name.'/assets/img') ;

            $this->cur_progress = 0 ;
            // copy buttons
            $btn_old = public_path('images/'.$this->event->name.'/btn') ;
            $this->copyFolder($btn_old , $path_img);

            if($this->cur_progress >= 99){
                $this->progress += 5 ;
            }

            // copy background
            $back_old = public_path('images/'.$this->event->name.'/background') ;
            $this->copyFolder($back_old , $path_img.'/background');

            $this->cur_progress = 0 ;
            if($this->cur_progress >= 99){
                $this->progress += 5 ;
            }

            // copy eposter
            $eposer_old = public_path('images/'.$this->event->name.'/eposter') ;
            $eposer_new = storage_path('projects/'.$this->event->name.'/assets/produit/e-poster/PDF') ;

            $this->cur_progress = 0 ;
            $this->copyFolder($eposer_old , $eposer_new);
            if($this->cur_progress >= 99){
                $this->progress += 5 ;
            }

            // copy programe
            $programme_old = public_path('images/'.$this->event->name.'/programme') ;
            $programme_new = storage_path('projects/'.$this->event->name.'/assets/produit/programe/programe-images') ;

            $this->cur_progress = 0 ;
            $this->copyFolder($programme_old , $programme_new);
            if($this->cur_progress >= 99){
                $this->progress += 5 ;
            }

            // copy themes
            $themess_old = public_path('images/'.$this->event->name.'/themes') ;
            $themess_new = storage_path('projects/'.$this->event->name.'/assets/produit/image') ;

            $this->cur_progress = 0 ;
            $this->copyFolder($themess_old , $themess_new);
            if($this->cur_progress >= 99){
                $this->progress += 5 ;
            }

            // copy images

            $image_old_high = public_path('images/'.$this->event->name.'/images/high') ;
            $image_old_low = public_path('images/'.$this->event->name.'/images/low') ;

            $image_new_high = storage_path('projects/'.$this->event->name.'/photos/images/himg') ;
            $image_new_low = storage_path('projects/'.$this->event->name.'/photos/images/imglow') ;


            // copy images high quality
            // $this-> = 0 ; :
            if(file_exists($image_old_high)){

                $this->copyFolder($image_old_high , $image_new_high);
                if($this->cur_progress >= 99){
                    $this->progress += 35 ;
                }
            }

            // copy images low quality
            $this->cur_progress = 0 ;
            if(file_exists($image_old_low)){
                $this->copyFolder($image_old_low , $image_new_low);
                if($this->cur_progress >= 99){
                    $this->progress += 25 ;
                }
            }

            $fileCount = count(scandir($image_old_low)) - 2;

            // change possition of buttons px -> 20 21 mobile -> 49 50 << home page >>
            $home_file = storage_path('projects/'.$this->event->name.'/index.html');
            $content = 'top: '.$this->event->btn_y_pc.'vh;';
            $this->write_at_right_place($home_file , $content , 20 );
            $content = 'left: '.$this->event->btn_x_pc.'vw;';
            $this->write_at_right_place($home_file , $content , 21 );

            $content = 'top: '.$this->event->btn_y_mobile.'vh;';
            $this->write_at_right_place($home_file , $content , 49 );
            $content = 'left: '.$this->event->btn_x_mobile.'vw;';
            $this->write_at_right_place($home_file , $content , 50 );

            // add logo icon home pade
            $content = '<title>'.$this->event->name.'</title>';
            if($this->event->logo){
                $content .= '<link rel="icon" href="assets/img/background/logo.png" type="image/x-icon"/>' ;
            }

            $this->write_at_right_place($home_file , $content , 6 );


            // set programme images
            $programe_file = storage_path('projects/'.$this->event->name.'/assets/produit/programe/programe.html');
            $content = '' ;
            $count = count($this->event->programmes);
            for($i=0; $i<$count; $i+=2) {
                if($i+1 < $count){
                    $content .= '<div class="imgcontant">
                    <img class="imgonet" src="programe-images/'.$this->event->programmes[$i]->image.'" alt="" srcset="">
                    <img src="programe-images/'.$this->event->programmes[$i+1]->image.'" alt="" srcset="">
                </div>';
                }else{
                    $content .= '<div class="imgcontant">
                    <img class="imgonet" src="programe-images/'.$this->event->programmes[$i]->image.'" alt="" srcset="">
                </div>';
                }
            }
            $this->write_at_right_place($programe_file , $content , 73);

            // set eposter possition 41
            $eposter_file = storage_path('projects/'.$this->event->name.'/assets/produit/e-poster/index.html');
            $content = '' ;
            foreach($this->event->eposters as $eposter){
                $content .= '<div class="iposter ">
                <a href="PDF/'.$eposter->pdf.'" class="portfolio-lightbox lien" data-gallery="portfolioGallery"> <i>'.$eposter->name.'</i></a>
              </div>';
            }
            $this->write_at_right_place($eposter_file , $content , 41);

            // set redifusion posstion 211 203

            $redifusion_file = storage_path('projects/'.$this->event->name.'/assets/produit/index.html');
            $content = '';
            foreach($this->event->days as $key=>$day){
                $active = "";
                if($key == 0){
                    $active = "jouractive";
                }
                $content .= '<div style="display: ;" class="jr'. $key+1 .' jr '.$active.'">
                <h1 style="background-color: '.$this->event->secendary_color .';"> '.$this->dateToFrench($day->date , "l j F Y").' </h1>' ;

                foreach($day->themes as $theme){
                    $content .= '<div class="txtnormal">
                    <li><a onclick="vedioSource(this , true)" id="'.$theme->video_url.'"><img
                        src="./image/'.$day->name.'/'.$theme->image.'" height="100px" width="100%" alt=""><span class="btnplay"><img
                        src="image/Play.png" width="10%" alt=""></span></a></li>
                </div>' ;
                }
                $content .= '</div>';

            }
            $this->write_at_right_place($redifusion_file , $content , 211);
            $content = '';

            foreach($this->event->days as $key=>$day){
                $active = "";
                if($key == 0){
                    $active = "btnactive";
                }
                $content .= '<button style="outline: none; " class="btnjr'.$key+1 .' '. $active.'">'.$day->name.'</button>';

            }
            $this->write_at_right_place($redifusion_file , $content , 203);

            // set color redifusion 31 166
            $content = 'background-color:'.$this->event->primary_color.';' ;
            $this->write_at_right_place($redifusion_file , $content , 31);
            $this->write_at_right_place($redifusion_file , $content , 166);

            // set color page gallory  primary color

            $gallory_file = storage_path('projects/'.$this->event->name.'/photos/index.html');
            $this->write_at_right_place($gallory_file , $content , 27);
            $content = "const maxVal = " . $fileCount-1 .";" ;
            $this->write_at_right_place($gallory_file , $content , 67);


            if($this->progress >= 100){
                $this->disabled = false ;
            }



        }

    }

    public function download(){
        $input = storage_path('projects/'.$this->event->name);
        $file = storage_path('projects/'.$this->event->name.'/'.$this->event->name.'.zip');
        $zip_file = $this->download_zip_file($input , $file);
        if(file_exists($zip_file)){
            $this->progress = 0 ;
            return response()->download($zip_file);
        }

    }

    function copyFolder($source, $destination) {
        $totalFiles = 0;
        $copiedFiles = 0;
        $totalSize = 0;
        $copiedSize = 0;

        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        $dir = opendir($source);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                $sourceFile = $source . '/' . $file;
                $destinationFile = $destination . '/' . $file;

                if (is_dir($sourceFile)) {
                    $result = $this->copyFolder($sourceFile, $destinationFile);

                    $totalFiles += $result['totalFiles'];
                    $copiedFiles += $result['copiedFiles'];
                    $totalSize += $result['totalSize'];
                    $copiedSize += $result['copiedSize'];
                } else {
                    $totalFiles++;
                    $totalSize += filesize($sourceFile);

                    if (copy($sourceFile, $destinationFile)) {
                        $copiedFiles++;
                        $copiedSize += filesize($destinationFile);

                        // Calculate progress
                        $progress = round(($copiedSize /( $totalSize +1)) * 100, 2);
                        $this->cur_progress = $progress;

                    }
                }
            }
        }

        closedir($dir);

        return [
            'totalFiles' => $totalFiles,
            'copiedFiles' => $copiedFiles,
            'totalSize' => $totalSize,
            'copiedSize' => $copiedSize
        ];
    }

    function removeFolder($folderPath) {
        if (!is_dir($folderPath)) {
            return;
        }

        $files = scandir($folderPath);
        foreach ($files as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            $filePath = $folderPath . '/' . $file;

            if (is_dir($filePath)) {
                $this->removeFolder($filePath);
            } else {
                unlink($filePath);
            }
        }

        rmdir($folderPath);
    }

    public function write_at_right_place($file ,$content , $line){
        $line_i_am_looking_for = $line;
        $lines = file( $file , FILE_IGNORE_NEW_LINES );
        $lines[$line_i_am_looking_for] = $content;
        file_put_contents( $file , implode( "\n", $lines ) );
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

    function download_zip_file($input , $file){

        $this->zip_folder($input , $file);

        return $file;

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
