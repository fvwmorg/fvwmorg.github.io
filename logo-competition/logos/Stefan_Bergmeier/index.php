<?php
//--------------------------------------------------------------------
//-  File          : @FILENAME@
//-  Project       : FVWM Home page
//-  Programmer    : Logo Competitor
//--------------------------------------------------------------------

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if (strlen($navigation_check) > 0) return;

$rel_path = "../../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path."/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Logo Competition - Stefan Bergmeier logos";
$heading        = "FVWM - Logo Competition - Stefan Bergmeier logos";
$link_name      = "Logo Competition";
$link_picture   = "pictures/icons/logo_competition";
$parent_site    = "news";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "logo_competition";

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if (strlen($site_has_been_loaded) == 0) {
	$site_has_been_loaded = "true";
	include(sec_filename($layout_file));
	exit();
}

if( file_exists("./../color_select.inc") ) include("./../color_select.inc");
?>

<?php 
decoration_window_start("By Stefan Bergmeier", "100%", "");
// From: "Stefan Bergmeier" <stefan.bergmeier@web.de>
?>

<p><img src="logo-transparent.gif" width="600" height="300"></p>

<p><img src="logo-white.gif" width="600" height="300"></p>

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
