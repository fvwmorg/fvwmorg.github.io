<?php
//--------------------------------------------------------------------
//-  File          : doc_faq.php
//-  Project       : Fvwm Home page
//-  Programmer    : Uwe Pross
//-  Last modified : <27.03.2003 21:46:42 uwe>
//--------------------------------------------------------------------

if( strlen($rel_path)==0 ) $rel_path="./..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM Sub site - doc_faq.php";
$heading        = "FVWM Sub site - doc_faq.php";
$link_name      = "FAQ";
$link_picture   = "pictures/icons/doc_faq";
$parent_site    = "documentation";
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
?>

-- site contents go here --

