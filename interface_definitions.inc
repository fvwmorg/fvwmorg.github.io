<?php
//--------------------------------------------------------------------
//-  File          : interface_definitions.inc                        
//-  Project       : Fvwm Homepage                                    
//-  Date          : Fri Apr 25 20:10:29 2003                         
//--------------------------------------------------------------------

//--------------------------------------------------------------------
// define some funtions which are used in the php files
//--------------------------------------------------------------------
function decoration_window_start($string="", $width="100%", $height="800", $padding="5") {
  global $layout_object;
  $layout_object->decoration_window_start($string, $width, $height, $padding);
}

function decoration_window_end() {
  global $layout_object;
  $layout_object->decoration_window_end();
}

function conv_link_target($target) {
  global $layout_object;
  return $layout_object->conv_link_target("$target");
}

function insert_quick_jump_list($jump_array, $col_num=2) {
  global $layout_object;
  $layout_object->insert_quick_jump_list($jump_array,$col_num);
}
?>