<?php
//--------------------------------------------------------------------
//-  File          : fvwm_cats/{cat name}.php
//-  Project       : FVWM Home Page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

$rel_path = "..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if(!isset($navigation_check)) include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "The Official FelineVWM Home Page - angel_resting";
$link_name      = "Cats";
$link_picture   = "pictures/icons/fvwm_cats";
$parent_site    = "home";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "fvwm_cats";

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
  $site_has_been_loaded = "true";
  include(sec_filename("$layout_file"));
  exit();
}
?>

  <?php decoration_window_start("angel_resting","","","0"); ?>
  <a href="<?php echo conv_link_target('./index.php');?>"><img src="angel_resting.jpg" border="0" hspace="0" vspace="0"></a>
  <?php decoration_window_end(); ?>