<?php
//--------------------------------------------------------------------
//-  File          : screenshots.php
//-  Project       : Fvwm Home page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//-  Last modified : <28.03.2003 07:37:25 uwp>
//--------------------------------------------------------------------

$rel_path="..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "Fvwm - Screenshots";
$link_name      = "Screenshots";
$link_picture   = "pictures/icons/screenshots";
$parent_site    = "top";
$child_sites    = array("screenshots_desks","screenshots_decor","screenshots_menu");
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "screenshots";

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

