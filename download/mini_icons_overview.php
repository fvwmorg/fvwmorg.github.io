<?php
//--------------------------------------------------------------------
//-  File          : download/icons.php
//-  Project       : FVWM Home Page
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

if(!isset($rel_path)) $rel_path = "./..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include_once($rel_path.'/definitions.inc'); 

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
if(!isset($site_has_been_loaded)) {
  $site_has_been_loaded = "true";
  include_once(sec_filename("$layout_file"));
  exit();
}

decoration_window_start("Mini Icons");
echo '<center>';
include(sec_filename("map_mini.html"));
echo '</center>';
decoration_window_end(); ?>
