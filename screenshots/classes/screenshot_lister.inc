<?php

include_once("directory_lister.inc");

class Screenshot_Lister extends Directory_Lister {

    var $processed_dir_array;

    function Screenshot_Lister($path=".") {

        Directory_Lister::get_valid_dir_array($path, array());

        $this->processed_dir_array = array();

        $this->process_dir_array();
    }

    function get_entry_by_regexp($dir_content_array, $regexps_array) {
        if( ! is_array($dir_content_array) || ! is_array($regexps_array) ) {
            return 0;
        }
        foreach( $regexps_array as $regexp ) {
            foreach( $dir_content_array as $file ) {
                if( preg_match("/".$regexp."/", $file["name"])) {
                    return $file;
                }
            }
        }
        return 0;
    }

    function get_preview_entry($dir_content_array, $regexps_array=array("^preview", "^thumb")) {
        return $this->get_entry_by_regexp($dir_content_array, $regexps_array);
    }

    function get_description_entry($dir_content_array, $regexps_array=array("^desc")) {
        return $this->get_entry_by_regexp($dir_content_array, $regexps_array);
    }

    function get_screenshot_entry($dir_content_array, $regexps_array=array("^screen", "^desk", "^shot")) {
        return $this->get_entry_by_regexp($dir_content_array, $regexps_array);
    }

    function get_description($dir_content_array, $path, $regexps_array=array("^desc")) {
        $file = $this->get_description_entry($dir_content_array, $regexps_array);
        $filename = $path."/".$file["name"];
        $desc = "";
        if( $handle = fopen($filename, "r") ) {
            while( $line = fgets($handle, 10000) ) {
                $desc = $desc." ".$line;
            }
            return $desc;
        }
        return 0;
    }

    function process_dir_array() {

         foreach( $this->dir_array as $key => $dir ) {

             $dirname = $dir["dirname"];
             $dir_content_array = $dir["contents"];
             
             // get information form the directory array about preview and screenshot
             $preview_entry     = $this->get_preview_entry($dir_content_array, array("^preview", "^thumb"));
             $screenshot_entry  = $this->get_screenshot_entry($dir_content_array, array("^screen", "^desk", "^shot"));

             // get the names, date and size
             $preview     = $preview_entry["name"];
             $screenshot  = $screenshot_entry["name"];
             $date        = $screenshot_entry["date"];
             $size        = $screenshot_entry["size"];
             $description = $this->get_description($dir_content_array, $dirname, array("^desc"));

             if( $preview && ! $this->check_previev($dirname."/".$preview, $dirname."/".$screenshot, "160x120") ) 
                 $preview = 0;

             if( $preview && $screenshot && $date && $size && $description ) {
                 echo "Exporting ".$dirname."\n";
                 $my_processed_dir_array["$date"."$key"]["path"]        = $dirname;
                 $my_processed_dir_array["$date"."$key"]["preview"]     = $preview;
                 $my_processed_dir_array["$date"."$key"]["screenshot"]  = $screenshot;
                 $my_processed_dir_array["$date"."$key"]["date"]        = $date;
                 $my_processed_dir_array["$date"."$key"]["size"]        = $size;
                 $my_processed_dir_array["$date"."$key"]["description"] = $description;
             } else {
                 echo "WARNING: ".$dirname." is not valid.\n";
             }

         }
         
         // sort the shots by date 
         krsort($my_processed_dir_array); 
         
         // create array having numbered index
         $this->processed_dir_array = array();
         $ii = 0;
         foreach( $my_processed_dir_array as  $my_processed_dir ) {
             $this->processed_dir_array[$ii++] = $my_processed_dir;
         }
    }

    function check_previev($preview, $screenshot, $size="160x120") {
        $output = exec("convert -verbose ".$preview." gif:/dev/null 2> /dev/null");
        // echo $output."\n";
        if( preg_match("/ ".$size."/", $output) ) {
            return 1;
        } else {
            echo "Creating new preview for ".$screenshot."\n";
            passthru("convert -verbose -scale ".$size." ".$screenshot." ".$preview." ");
            return 1;
        }
        
    }

}

?>