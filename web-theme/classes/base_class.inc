<?php
//--------------------------------------------------------------------
//-  File          : base_class.inc                                   
//-  Project       : Fvwm Home Page                                   
//--------------------------------------------------------------------

class Base_Theme {

    // member variables
    var $theme_name;
    var $rel_path;
    var $style_array;
    var $nav_array;
    var $user_settings_array;
    var $decoration_path_stack;
    var $requested_file;
    var $this_site;
    var $navigation_file;

    function Base_Theme() {
        $this->init();
    }

    function init() {
        // set member variables from the environment
        $this->globals2internals();

        // set default settings for this theme
        $this->init_style_array();
        
        // set navigation array and top array
        include(sec_filename($this->navigation_file));

        // create an empty decoration path stack
        $this->decoration_path_stack = array();
        
        // store user settings in user settings array
        $this->set_user_settings();
    }

    // default settings for this theme
    function init_style_array() {
        include(theme_file("theme_descriptions.inc"));
        if( ! is_array($this->theme_descriptions[$this->theme_name]["style"]) ) {
            $this->style_array = array();
            return;
        }
        // print_r($_COOKIE);
        foreach( $this->theme_descriptions[$this->theme_name]["style"] as $style => $desc ) {
            if( isset($desc["value"]) ) {
                if( $value = get_user_setting($style, array("GET", "POST", "SESSION", "COOKIE")) ) {
                    $this->style_array[$style] = str_replace("@REL_PATH@", $this->rel_path, $value);
                    // echo "$style -> $value <br>";
                } else {
                    $this->style_array[$style] = str_replace("@REL_PATH@", $this->rel_path, $desc["value"]);
                }
            }
        }
        // echo "<pre>";
        // print_r($this->style_array);
        // echo "</pre>";
    }

    function globals2internals() {
        global $navigation_file, $requested_file, $rel_path, $this_site;
        if( strlen($navigation_file) < 1 )
            die("<span class=\"error\">No navigation file specified</span><br>");
        $this->navigation_file = $navigation_file;
        $this->requested_file  = $requested_file;
        $this->rel_path        = $rel_path;
        $this->this_site       = $this_site;
    }

    function set_user_settings() {
        $this->user_settings_array = array();
        // override default settings by user settings
        foreach( $this->style_array as $key => $default ) {
            if( $setting = get_user_setting($key, array("GET")) ) {
                $this->user_settings_array[$key] = str_replace("#", "%23", $setting);
                // $this->user_settings_array[$key] = $setting;
                // $this->style_array[$key] = $this->user_settings_array[$key];
            }
        }
        if( $theme = my_get_global("theme", "GET") ) {
            $this->user_settings_array["theme"] = $theme;
        }
    }


    // time stampt function to insert a statement on the site when the
    // viewing pages was changed
    function insert_timestamp($file) {
        if( file_exists($file) ) {
            echo 'Last modified on '.date('F d, Y', filectime("$file"));
        }
    }

    // function returns an array which contains the names of pages which
    // are parents from the current pages like
    // home -> photos -> holiday -> beach
    // it is mostly used to display this path as links
    function get_parent_path($site) {
        // first we should check if the array is consistent
        if( strlen($this->nav_array["$site"]["parent_site"]) < 1 ) {
            // echo "Error in navigation array<br>";
            // the actual site is not in the navigation array
            // we return the first entry of $this->nav_array["top_array"] here
            return $this->nav_array["top_array"][0];
        }
        // check if this site is a parent - if not return the parent
        // of its parent; -)
        if( ! strcmp( $this->nav_array["$site"]["parent_site"], "top") ) {
            if( ! strcmp($site, $this->nav_array["top_array"][0]) ||
                count($this->nav_array["$site"]["child_sites"]) == 0 )
                return array($site);
            else
                return array($this->nav_array["top_array"][0], $site);
        } else {
            $parent_path = $this->get_parent_path($this->nav_array["$site"]["parent_site"]);
            $parent_path[] = $site;
            return $parent_path;
        }
    }

    // this function is used to have all link targets in the same format
    // and do some conversions here. for exampe one may convert php to
    // html here to get a html tree of this web project
    function conv_link_target($target) {

        if( count($this->user_settings_array) > 0 ) {
            reset($this->user_settings_array);
            list($key, $setting) = each($this->user_settings_array);
            $opts = "?".$key."=".$setting;
            while( list($key, $setting) = each($this->user_settings_array) ) {
                $opts = $opts."&".$key."=".$setting;
            }
        }
        // temporarily disabled until this is the only existing web design
        //$target = str_replace("index.php", "", $target);
        return $target.$opts;
    }


    // pushes the actual decoration path to a stack and set the given
    // argument as decoration path. this function is used to have
    // different window decorations on the same page
    function push_decoration_path($path) {
        $this->decoration_path_stack[] = $this->style_array["decoration_path"];
        $this->style_array["decoration_path"] = $this->rel_path."/".$path;
    }

    // pops the last value from the stack and sets it to the actual
    // decoration path. this function is used to have different window
    // decorations on the same page
    function pop_decoration_path() {
        if( count($this->decoration_path_stack) == 0 ) return;
        end($this->decoration_path_stack);
        list($key, $value) = each($this->decoration_path_stack);
        $this->style_array["decoration_path"] = $this->decoration_path_stack[$key];
        unset($this->decoration_path_stack[$key]);
    }

    function decoration_pic($direction) {}
    function decoration_cell_start($position, $string, $css,
                                   $bg_repeat="repeat", $bg_pos="top",
                                   $td_options="") {}
    function decoration_top_left_cell_start($string="", $css="") {}
    function decoration_top_left_cell($string="", $css="") {}
    function decoration_top_cell_start($string="", $css="") {}
    function decoration_top_cell($string="", $css="") {}
    function decoration_top_right_cell_start($string="", $css="") {}
    function decoration_top_right_cell($string="", $css="") {}
    function decoration_left_cell_start($string="", $css="") {}
    function decoration_left_cell($string="", $css="") {}
    function decoration_middle_cell_start($string="", $css="") {}
    function decoration_middle_cell($string="", $css="") {}
    function decoration_right_cell_start($string="", $css="") {}
    function decoration_right_cell($string="", $css="") {}
    function decoration_bottom_left_cell_start($string="", $css="") {}
    function decoration_bottom_left_cell($string="", $css="") {}
    function decoration_bottom_cell_start($string="", $css="") {}
    function decoration_bottom_cell($string="", $css="") {}
    function decoration_bottom_right_cell_start($string="", $css="") {}
    function decoration_bottom_right_cell($string="", $css="") {}
    function decoration_top_line($string="", $add_css="") {}
    function decoration_middle_line($string="", $add_css="") {}
    function decoration_bottom_line($string="", $add_css="") {}
    function decoration_title_bar($string="") {}
    function decoration_window_start($string="", $width="100%", $height="400", $padding="5") {}
    function decoration_window_end() {}
    function insert_quick_jump_list($quick_jump_array, $col_num = 2, $width = "60%") {}
}

?>

