<?php

include_once("directory_lister.inc");

class Screenshot_Lister extends Directory_Lister {

    var $processed_dir_array;
    var $database_filename;
    var $old_database;
    var $check_preview_size;

    function Screenshot_Lister($path=".") {
        $this->check_preview_size = 0;
        $this->database_filename = "./screenshot_db.inc";
        Directory_Lister::get_valid_dir_array($path, array());
        $this->processed_dir_array = array();
        $this->read_existing_data_base();
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
        
        $my_processed_dir_array = array();
        foreach( $this->dir_array as $key => $dir ) {
            
            $dirname = $dir["dirname"];
            $dir_content_array = $dir["contents"];

            printf( "Processing %-40s ", ${dirname});
            
            // get information form the directory array about preview and screenshot
            $preview_entry     = $this->get_preview_entry($dir_content_array, array("^preview", "^thumb"));
            $screenshot_entry  = $this->get_screenshot_entry($dir_content_array, array("^screen", "^desk", "^shot"));
            
            // get the names, date and size
            $preview     = $preview_entry["name"];
            $screenshot  = $screenshot_entry["name"];
            $date        = $screenshot_entry["date"];
            $size        = $screenshot_entry["size"];
            $description = $this->get_description($dir_content_array, $dirname, array("^desc"));
            
            if( $screenshot && 
                ! $preview = $this->check_previev($preview, $screenshot, $dirname, "160x120") ) {
                $preview = 0;
            }
            
            if( ! $dimension = $this->get_dimension($screenshot, $dirname, $date) ) {
                $screenshot = 0;
            }
            
            // echo "$preview , $screenshot \n";
            
            if( $preview && $screenshot && $date && $size && $description && $dimension ) {
                printf( "ok %9s %4sk %s", $dimension, ceil($size/1024), str_replace("screenshot.", "", $screenshot) );
                if( ceil($size/1024) > 300 ) {
                    echo " \033[31;2m[size warning]\033[0m";
                }
                echo "\n";
                $my_processed_dir_array["${date}_${key}"]["path"]        = $dirname;
                $my_processed_dir_array["${date}_${key}"]["preview"]     = $preview;
                $my_processed_dir_array["${date}_${key}"]["screenshot"]  = $screenshot;
                $my_processed_dir_array["${date}_${key}"]["date"]        = $date;
                $my_processed_dir_array["${date}_${key}"]["size"]        = $size;
                $my_processed_dir_array["${date}_${key}"]["dimension"]   = $dimension;
                $my_processed_dir_array["${date}_${key}"]["description"] = $description;
            } else {
                echo ". \033[34;1mFAILED on [";
                if( ! $preview )     echo " preview";
                if( ! $screenshot )  echo " screenshot";
                if( ! $description ) echo " description";
                if( ! $dimension )   echo " dimension";
                echo " ]\033[0m\n";
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
    
    function check_previev($preview, $screenshot, $path, $size="160x120") {
        if( $preview ) {
            $prev = "${path}/${preview}";
            if( $this->check_preview_size ) {
                // echo "Get preview dimensions ...\n";
                $output = exec("convert -verbose ${prev} gif:/dev/null 2> /dev/null");
            } else {
                $output = "  ".$size;
            }
        } else {
            $preview = "preview.gif";
            $prev = "${path}/${preview}";
            $output = "";
        }
        // echo $output."\n";
        if( preg_match("/ ".$size."/", $output) ) {
            return $preview;
        } else {
            echo "\nNo preview. Creating one from ${path}/${screenshot}\n";
            passthru("convert -verbose -scale ${size}! ${path}/${screenshot} ${prev}");
            echo "Checking ${path} ..";
            return $preview;
        }       
    }

    function get_dimension($screenshot, $path, $date) {
        if( $this->old_database[$path] ) {
            // echo "Found entry in old data base ...\n";
            if( $this->old_database[$path]["date"] == $date ) {
                // echo "File has not changed since then - using it\n";
                return $this->old_database[$path]["dimension"];
            }
        }
        $output = exec("convert -verbose ".$path."/".$screenshot." gif:/dev/null 2> /dev/null");
        // echo $output."\n";
        $dim = preg_replace('/^.* (\d+x\d+)[\+ ].*$/', "$1", $output);
        // echo $dim."\n";
        return $dim;
    }

    function read_existing_data_base() {
        if( file_exists($this->database_filename) ) {
            include($this->database_filename);
        } else {
            echo "No existing data base\n";
            return;
        }
        $this->old_database = array();
        for($index=0; $index<count($db); $index++) {
            // echo "Saving old entry for '".$db[$index]["path"]."'\n";
            $this->old_database[$db[$index]["path"]] = $db[$index];
        }
    }

}

?>