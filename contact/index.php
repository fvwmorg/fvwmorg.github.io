<?php
//--------------------------------------------------------------------
//-  File          : contact/index.php
//-  Project       : FVWM Home Page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//-  Last modified : <28.03.2003 07:37:02 uwp>
//--------------------------------------------------------------------

$rel_path = "..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Contact";
$link_name      = "FVWM - Contact";
$link_picture   = "pictures/icons/contact";
$parent_site    = "top";
$child_sites    = array("mail_archive", "mailing_lists");
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "contact";

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

