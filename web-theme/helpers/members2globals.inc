<?php
//--------------------------------------------------------------------
//-  File          : members2globals.inc
//-  Project       : Fvwm Homepage                                    
//-  Date          : Fri Apr 25 20:10:29 2003                         
//--------------------------------------------------------------------

//--------------------------------------------------------------------
// define some funtions which are used in the php files
//--------------------------------------------------------------------
function decoration_window_start($string="", $width="100%", $height="400", $padding="5") {
    global $theme_object;
    $theme_object->decoration_window_start($string, $width, $height, $padding);
}

function decoration_window_end() {
    global $theme_object;
    $theme_object->decoration_window_end();
}

function conv_link_target($target) {
    global $theme_object;
    return $theme_object->conv_link_target("$target");
}

function mylink($target, $text, $opt="") {
    global $theme_object;
    echo '<a href="'.$theme_object->conv_link_target("$target").'" '.$opt.'>'.$text.'</a>';
}

function insert_quick_jump_list($jump_array, $col_num=2) {
    global $theme_object;
    $theme_object->insert_quick_jump_list($jump_array,$col_num);
}
?>