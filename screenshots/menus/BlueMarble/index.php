<?php
//--------------------------------------------------------------------
//-  File          : screenshots/menus/<menu name>/index.php
//-  Project       : FVWM Home Page
//--------------------------------------------------------------------

$rel_path = "../../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
// if(!isset($navigation_check)) include_once($rel_path.'/definitions.inc');

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
// $title          = "FVWM - Desktop Screenshots";
// $link_name      = "Desktop Screenshots";
// $link_picture   = "pictures/icons/screenshots_desks";
// $parent_site    = "screenshots";
// $child_sites    = array();
// $requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
// $this_site      = "screenshots_desks";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

include("../menu_index.inc");

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
// if(!isset($site_has_been_loaded)) {
//   $site_has_been_loaded = "true";
//   include(sec_filename("$layout_file"));
//   exit();
// }

?>

