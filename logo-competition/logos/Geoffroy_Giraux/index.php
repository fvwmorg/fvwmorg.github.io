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
$title          = "FVWM - Logo Competition - Geoffroy Giraux logos";
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

<?php 
decoration_window_start('By Geoffroy Giraux', "100%", ""); 
// From: Geoffroy Giraux <Geoffroy.Giraux@ecl2003.ec-lyon.fr>
// Date: Sat, 12 Jul 2003 18:15:14 +0200
// To: fvwm-logo@lists.sourceforge.net 
// Subject: [FVWM-LOGO] logo submission
?>

<p><img src="logo_fvwm_curved_bw.png"></p>
<p><img src="logo_fvwm_curved_noborder.png"></p>

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
