<?php
//--------------------------------------------------------------------
//-  File          : screenshots/vectorbuttons/index.php
//-  Project       : FVWM Home Page
//--------------------------------------------------------------------

$rel_path = "../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if (strlen("$navigation_check") == 0) include($rel_path.'/definitions.inc');

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Vectorbuttons";
$link_name      = "Vectorbuttons";
$link_picture   = "pictures/icons/default";
$parent_site    = "screenshots";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "screenshots_vectorbuttons";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if( strlen("$navigation_check") > 0 ) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if( strlen("$site_has_been_loaded") == 0 ) {
  $site_has_been_loaded = "true";
  include(sec_filename("$layout_file"));
  exit();
}
?>

<?php decoration_window_start("FVWM Vectorbuttons"); ?>

<table summary="">
<?php include(sec_filename("vectorbuttonlist.inc")); ?>
</table>

<?php decoration_window_end(); ?>
