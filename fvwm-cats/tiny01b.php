<?php
//--------------------------------------------------------------------
//-  File          : fvwm_cats/{cat name}.php
//-  Project       : FVWM Home Page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//-  Last modified : <31.03.2003 20:24:16 uwe>
//--------------------------------------------------------------------

$rel_path = "..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if( strlen("$navigation_check") > 0 ) return;

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "The Official FelineVWM Home Page - tiny01b";
$link_name      = "Cats";
$link_picture   = "pictures/icons/fvwm_cats";
$parent_site    = "home";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "fvwm_cats";

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

  <?php decoration_window_start("tiny01b","","","0"); ?>
  <a href="index.php"><img src="tiny01b.jpg" border="0" hspace="0" vspace="0"></a>
  <?php decoration_window_end(); ?>