<?php
//--------------------------------------------------------------------
//-  File          : documentation/manpages/manpages_toc_template.php_
//-  Project       : FVWM Home Page
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

// this is a template file for the table of contents of the manual 
// pages. 
// It is used to generate the file documentation/manpages/index.php

if (strlen($rel_path) == 0) $rel_path = "../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Manual pages";
$heading        = "FVWM - Manual pages";
$link_name      = "Man pages";
$link_picture   = "pictures/icons/doc_manpages";
$parent_site    = "documentation";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "manpages";

//--------------------------------------------------------------------
// check if we should stop here in case of a navgen run
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

<?php decoration_window_start("List of manual pages"); ?>  

<a href="fvwm.php">fvwm</a>

<?php decoration_window_end(); ?>