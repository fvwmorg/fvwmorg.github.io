<?php
//--------------------------------------------------------------------
//-  File          : screenshots/vectorbuttons/index.php
//-  Project       : FVWM Home Page
//--------------------------------------------------------------------

$rel_path = "../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if(!isset($navigation_check)) include_once($rel_path.'/definitions.inc');

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Vectorbuttons";
$link_name      = "Vectorbuttons";
$link_picture   = "pictures/icons/screenshots_vectorbuttons";
$parent_site    = "screenshots";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "screenshots_vectorbuttons";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
  $site_has_been_loaded = "true";
  include_once(sec_filename("$layout_file"));
  exit();
}
?>

<?php decoration_window_start("FVWM Vectorbuttons"); ?>

FVWM provides a variety of ways to decorate the buttons in  the  title
bar.  Vector  buttons  are  images  drawn using the buttons shadow and
highlight colors. This page shows some of the vector buttons that have
been contributed to the project. 

<table summary="">
<?php include(sec_filename("vectorbuttonlist.inc")); ?>
</table>

<?php decoration_window_end(); ?>
