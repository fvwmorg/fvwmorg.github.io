<?php
//--------------------------------------------------------------------
//-  File          : download/icons.php
//-  Project       : FVWM Home Page
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

if (strlen($rel_path) == 0) $rel_path = "./..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Download Icons";
$heading        = "FVWM - Mini Icons";
$link_name      = "Icons";
$link_picture   = "pictures/icons/download_icons";
$parent_site    = "download";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "icons";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if( strlen("$navigation_check") > 0 ) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if( strlen("$site_has_been_loaded") == 0 ) {
  $site_has_been_loaded = "true";
  if( strlen($layout) > 0 ) {
    $file = $rel_path."/layout_".$layout.".inc";
    if( file_exists($file) ) $layout_file = $file;
  }
  include(sec_filename("$layout_file"));
  exit();
}

decoration_window_start("Mini Icons");
echo '<center>';
include(sec_filename($rel_path."/icons/map_mini.html"));
echo '</center>';
decoration_window_end(); ?>
