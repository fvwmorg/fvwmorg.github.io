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
$title          = "FVWM - Logo Competition - Keran logos";
$heading        = "FVWM - Logo Competition - Keran logos";
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

<?php decoration_window_start("By Keran", "100%", ""); ?>

<?php 
// From: Keran <keran@73prozent.de>
// Date: Tue, 26 Aug 2003 00:10:24 +0200
// To: fvwm-logo@lists.sourceforge.net
// Subject: [FVWM-LOGO] new logo contribution
?>

<p><img src="bullet.png"></p>
<p><img src="carre.png"></p>
<p><img src="danger.png"></p>
<p><img src="exclamation.png"></p>
<p><img src="feu.png"></p>
<p><img src="forward.png"></p>
<p><img src="horizon.png"></p>
<p><img src="panneau.png"></p>
<p><img src="pastille.png"></p>
<p><img src="pastille2.png"></p>
<p><img src="point.png"></p>
<p><img src="sauvage.png"></p>
<p><img src="sens_unique.png"></p>
<p><img src="star.png"></p>
<p><img src="troue.png"></p>

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
