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
// load some
//--------------------------------------------------------------------
include_once($rel_path."/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Logo Competition - Greg Rymer logos";
$heading        = "FVWM - Logo Competition - Greg Rymer logos";
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
	include_once(sec_filename($layout_file));
	exit();
}

if( file_exists("./../color_select.inc") ) include_once("./../color_select.inc");
?>

<?php decoration_window_start("By Greg Rymer", "100%", ""); ?>

<?php 
// From: Greg Rymer <greg@66k.net>
// Date: Tue, 5 Aug 2003 23:42:24 +0100
// To: fvwm-logo@lists.sourceforge.net
// Subject: [FVWM-LOGO] fvwm logo competition.
?>
<p><img src="fvwm-transparent-black-template.png" border="0"></p>
<p><img src="fvwm.png" border="0"></p>

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
