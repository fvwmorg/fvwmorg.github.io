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
$title          = "FVWM - Logo Competition - Anthony Lee logos";
$heading        = "FVWM - Logo Competition - Anthony Lee logos";
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

<?php 
decoration_window_start("By Anthony Lee", "100%", ""); 
// From: "j.gordon4" <j.gordon4@ntlworld.com>
// Date: Mon, 14 Jul 2003 09:41:52 -0700
// To: <fvwm-logo@lists.sourceforge.net>
// Subject: [FVWM-LOGO] LOGO
?>

<p>
</p>

<p><img src="fvwmlogo.gif" width="656" height="352"></p>
<p><img src="fvwmlogo1.gif" width="649" height="392"></p>
<p><img src="paw.png" width="777" height="572"></p>
<p><img src="logocatgreen.jpg" width="404" height="447"></p>

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
