<?php

include_once("directory_lister.inc");

class Screenshot_Lister extends Directory_Lister {

    var $processed_dir_array;

    function Screenshot_Lister($path=".") {
        
        Directory_Lister::get_valid_dir_array($path, array("^description", 
                                                           "^preview", 
                                                           "^screenshot"));
        
        $this->processed_dir_array = array();

        $this->process_dir_array( array("preview", "screenshot"),
                                  array("description"),
                                  "screenshot");
    }

    function process_dir_array($filenames_to_find, 
                               $filenames_to_read, 
                               $date_size_information) {

        foreach( $this->valid_dir_array as $key => $dir ) {

            $dirname = $dir["dirname"];
            $entry_is_not_valid = 0;

            foreach( $filenames_to_find as $filename ) {
                $$filename = "";
                foreach( $dir["contents"] as $file ) {
                    if( preg_match( "/^".$filename."/", $file["name"] ) ) {
                        $$filename = $dirname."/".$file["name"];
                        if( ! strcmp($date_size_information, $filename) ) {
                            $size = $file["size"];
                            $date = $file["date"];
                        }
                    }
                }
                if( ! $$filename ) {
                    echo $dirname." failed on ".$filename."\n";
                    $entry_is_not_valid = 1;
                }
            }

            foreach( $filenames_to_read as $filename ) {
                $$filename = "";
                foreach( $dir["contents"] as $file ) {
                    if( preg_match( "/^".$filename."/", $file["name"] ) ) {
                        if( $handle = fopen($dirname."/".$file["name"], "r") ) {
                            $$filename = fgets($handle, 10000);
                        }
                    }
                }
                if( ! $$filename ) {
                    echo $dirname." failed on ".$filename."\n";
                    $entry_is_not_valid = 1;
                }
            }

            
            if( ! $entry_is_not_valid ) {
                foreach( $filenames_to_find as $entry ) $this->processed_dir_array[$key][$entry] = $$entry;
                foreach( $filenames_to_read as $entry ) $this->processed_dir_array[$key][$entry] = $$entry;
                foreach( array("size", "date") as $entry ) $this->processed_dir_array[$key][$entry] = $$entry;
                echo "Processed ".$dirname."\n";
            } else {
                echo "WARNING: ".$dirname." causes an internal error in Screenshot_Lister::processed_dir_array. Not exported.\n";
            }

        }
    }

}

?>