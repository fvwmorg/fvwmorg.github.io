<?php
//--------------------------------------------------------------------
//-  File          : screenshots/windowdecors.php
//-  Project       : FVWM Home Page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//-  Last modified : <31.03.2003 10:17:18 uwp>
//--------------------------------------------------------------------

$rel_path = "./..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Window Decoration Screenshots";
$link_name      = "Decors";
$link_picture   = "pictures/icons/screenshots_decor";
$parent_site    = "screenshots";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = str_replace(".php", "", "$requested_file");

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
?>

