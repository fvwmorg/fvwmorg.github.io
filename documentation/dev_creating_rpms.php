<?php
//--------------------------------------------------------------------
//-  File          : developers.php
//-  Project       : Fvwm Home page
//-  Programmer    : Uwe Pross
//-  Last modified : <06.04.2003 19:24:25 uwe>
//--------------------------------------------------------------------

if( strlen($rel_path)==0 ) $rel_path="./..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Developers";
$heading        = "FVWM - Developer Information";
$link_name      = "Developer Info";
$link_picture   = "pictures/icons/doc_developers";
$parent_site    = "developers";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = str_replace(".php","","$requested_file");

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

decoration_window_start("Developer Information");
?>


<?php decoration_window_end(); ?>