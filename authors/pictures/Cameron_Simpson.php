<?php
//--------------------------------------------------------------------
//-  File          : template.php_
//-  Project       : FVWM Home Page
//--------------------------------------------------------------------

// Usage:
// ls *jpg | grep -v small | sed 's+.jpg++;s+.*+sed "s/Cameron Simpson/&/g" template.php_ > &.php+' | sh


if(!isset($rel_path)) $rel_path = "./../..";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include_once("$rel_path/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "Cameron Simpson";
$heading        = "Cameron Simpson";
$link_name      = "Cameron Simpson";
$link_picture   = "pictures/icons/home";
$parent_site    = "top";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "authors";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
  $site_has_been_loaded = "true";
  include_once(sec_filename($layout_file));
  exit();
}

decoration_window_start("Cameron Simpson"); 
?>

<a href="<?php echo conv_link_target('./index.php'); ?>">Back to image overview.</a><br>
<img src="Cameron_Simpson.jpg" border="0" hspace="10" vspace="10"><br>

<a href="http://www.cskk.ezoshosting.com/cs/">Personal Website</a>

<?php 
decoration_window_end(); 
?> 
