<?php
//--------------------------------------------------------------------
//-  File          : template.php_
//-  Project       : FVWM Home Page
//--------------------------------------------------------------------

// Usage:
// ls *jpg | grep -v small | sed 's+.jpg++;s+.*+sed "s/Dan Espen/&/g" template.php_ > &.php+' | sh


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
$title          = "Dan Espen";
$heading        = "Dan Espen";
$link_name      = "Dan Espen";
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

decoration_window_start("Dan Espen"); 
?>

<a href="<?php echo conv_link_target('./index.php'); ?>">Back to image overview.</a><br>
<img src="Dan_Espen.jpg" border="0" hspace="10" vspace="10"><br>

<a href="http://mywebpages.comcast.net/despen/">Personal Website</a>

<?php 
decoration_window_end(); 
?> 
