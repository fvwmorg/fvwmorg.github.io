<?php
//--------------------------------------------------------------------
//-  File          : directory_lister.inc                             
//-  Project       : Fvwm Homepage                                    
//-  Author        : Uwe Pross                                        
//--------------------------------------------------------------------

class Directory_Lister {

    var $dir_array;
    
    function Directory_Lister() {
        $dir_array = array();
    }

    function get_filetype_array($directory_name, $file_type) {
        if( ! $directory = @opendir($directory_name) ) {
            return 0;
        }
        $file_array = array();
        while($file = readdir($directory)) {
            if( $file != "." && $file != ".." && filetype("$directory_name/$file") == $file_type ) {
                $file_array[] = array(
                                      'name' => $file,
                                      'size' => filesize("$directory_name/$file"),
                                      'date' => filemtime("$directory_name/$file")
                                      );
            }
        }
        closedir($directory);
        return $file_array;
    }

    function get_file_array($directory_name) {
        return $this->get_filetype_array($directory_name,"file");
    }

    function get_dir_array($directory_name) {
        return $this->get_filetype_array($directory_name,"dir");
    }

    // scans the contents of all sub directories and stores them to an array if
    // if contains all files in $required_files_regexp
    function get_valid_dir_array($directory_name, $required_files_regexp = array()) {
        $dir_array = $this->get_dir_array($directory_name);
        // print_r($dir_array);
        foreach( $dir_array as $dir ) {
            $file_array = $this->get_file_array($directory_name."/".$dir["name"]);
            $add_to_valid_dir_list = 1;
            // print_r($file_array);
            if( is_array($required_files_regexp) ) {
                foreach( $required_files_regexp as $expr ) {
                    $found = 0;
                    foreach( $file_array as $file ) {
                        // echo "$expr => $file <br>";
                        if( preg_match("/".$expr."/", $file["name"]) ) {
                            $found = 1;
                        }
                    }
                    if( !$found ) {
                        $add_to_valid_dir_list = 0;
                    }
                }
            }
            if( $add_to_valid_dir_list ) {
                $this->dir_array[] = 
                    array(
                          "dirname"  => $directory_name."/".$dir["name"],
                          "contents" => $file_array
                          );
                echo "Found valid ".$dir["name"]."\n";
            } else {
                echo "WARNING: Invalid ".$dir["name"].". Not added\n";
            }
        }
        echo "Results:\n";
        print_r($this->dir_array);
    }
    
    // nice export of variables
    function export_var($file, $var, $offset=0) {
        if( is_array($var) ) {
            fputs($file, "array(\n" );
            foreach( $var as $key => $value ) {
                $chars = fputs($file, str_repeat(" ",$offset));
                $chars += $this->export_var($file, $key);
                $chars += fputs($file, " => ");
                $this->export_var($file, $value, $chars + 6);
                fputs($file, ",\n");
            }
            fputs($file, str_repeat(" ",$offset).")");
        }
        elseif( is_string($var) ) {
            $chars = fputs($file, "'".str_replace("'", "\'", $var)."'");
        }
        else {
            $chars = fputs($file, $var);        
        }
        return $chars;
    }
}



?>