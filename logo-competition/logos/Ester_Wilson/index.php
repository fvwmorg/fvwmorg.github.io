<?php
//--------------------------------------------------------------------
//-  File          : @FILENAME@
//-  Project       : FVWM Home page
//-  Programmer    : Logo Competitor
//--------------------------------------------------------------------

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

$rel_path = "../../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include_once($rel_path."/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Logo Competition - Ester Wilson logos";
$heading        = "FVWM - Logo Competition - Ester Wilson logos";
$link_name      = "Logo Competition";
$link_picture   = "pictures/icons/logo_competition";
$parent_site    = "news";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "logo_competition";

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
	$site_has_been_loaded = "true";
	include(sec_filename($layout_file));
	exit();
}

if( file_exists("./../color_select.inc") ) include("./../color_select.inc");
?>

<?php decoration_window_start("By Ester Wilson", "100%", ""); ?>

<?php 
// From: "Comcast Mail" <turtlebugw@comcast.net>
// Date: Fri, 4 Jul 2003 20:21:29 -0700
// To: <fvwm-logo@lists.sourceforge.net>
// Subject: [FVWM-LOGO] logo submission 1 
?>

<p><img src="fvwm_1.png" width="507" height="195"></p>
<p><img src="fvwm_2.png" width="361" height="297"></p>
<p><img src="fvwm_3.png" width="505" height="191"></p>
<p><img src="fvwm_4.png" width="526" height="131"></p>
<p><img src="fvwm_5.png" width="485" height="233"></p>
<p><img src="fvwm_6.png" width="528" height="283"></p>

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
