<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DirectoryIterator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use ZipArchive;
class TestController extends Controller
{
    public function index() 
    {
        // dd(Hash::make('admin@gmail.com'));
        // $content = '';
        // $days = ['jeudi' , 'vendredi','samedi'] ;
        // foreach($days as $n=>$day){
                    
        //     $content .= '<button style="outline: none;" class="btnjr'.$n.'">'.$day.'</button>' ; 
        // }
        // dd($content);
        // $this->write_at_right_place($content,203);
        // dd(Auth());
        // windows path desktop getenv("HOMEDRIVE").getenv("HOMEPATH")."\Desktop"
        
          
        // mkdir('/home/sourcedartnew/') ;
        // $result = scandir('/home/sourcedartnew/');
        // dd($result) ;

        // (B) GO!
    
        $old = '/home/'.get_current_user().'/Desktop/demo';
        $new = '/home/'.get_current_user().'/Desktop/zipe.zip';
        $this->zip_folder($old , $new);
        
        $this->download_zip_file($new);
        
        // Opening a directory
        // $dir_handle = opendir("C:\\xampp\htdocs\\e-poster");
        
        // if(is_resource($dir_handle))
        // {
        //     while(($file_name = readdir($dir_handle)) == true) 
        //     { 
        //         echo("File Name: " . $file_name);
        //         echo "<br>" ; 
        //     }
        //     closedir($dir_handle);
        // } 
        // else
        // {
        //     dd("Directory Cannot Be Opened.");
        // } 
    
    }
    // (A) COPY ENTIRE FOLDER
    public function copyimages ($old , $new) {
        

        // Checking whether file exists or not
        if (!file_exists($new)) {
            // Create a new file or direcotry
            mkdir($new, 0777, true);
        }
        
        $dh = opendir($old);
        
        while (($file = readdir($dh)) !== false) {
            
            if (preg_match('/\.(jpg|png|jpeg)$/', $file)) {
                copy($old.'/'.$file, $new.'/'.$file);
            }
        }
        closedir($dh);
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

    function download_zip_file($file){

        if (file_exists($file)) {
            // Set headers
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Content-Length: ' . filesize($file));

            // Read and output the file content
            readfile($file);

            exit;
        } else {
            echo "File not found.";
        }

    }
}
