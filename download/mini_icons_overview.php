<?php
//--------------------------------------------------------------------
//-  File          : download/icons.php
//-  Project       : FVWM Home Page
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if( strlen("$navigation_check") > 0 ) return;

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
// load the layout file
//--------------------------------------------------------------------
if( strlen("$site_has_been_loaded") == 0 ) {
  $site_has_been_loaded = "true";
  include(sec_filename("$layout_file"));
  exit();
}

decoration_window_start("Mini Icons");
echo '<center>';
include(sec_filename("map_mini.html"));
echo '</center>';
decoration_window_end(); ?>
