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
$title          = "FVWM - Logo Competition - Daniel Gadziemski logos";
$heading        = "FVWM - Logo Competition - Daniel Gadziemski logos";
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

<?php decoration_window_start("By Daniel Gadziemski", "100%", ""); ?>

<p>
<?php 
// From: Daniel Gadziemski <samael@poczta.neostrada.pl>
// Date: Sun, 27 Jul 2003 10:31:27 +0200
// To: fvwm-logo@lists.sourceforge.net
// Subject: [FVWM-LOGO] FVWM-logo-Competition
?>

<p><img src="fvwm1-2.png" border="0"></p>
<p><img src="fvwm1.png" border="0"></p>
<p><img src="fvwm2-1.png" border="0"></p>
<p><img src="fvwm2-2.png" border="0"></p>
<p><img src="fvwm2-3.png" border="0"></p>
<p><img src="fvwm2-4.png" border="0"></p>
<p><img src="fvwm2-5.png" border="0"></p>
<p><img src="fvwm2.png" border="0"></p>
<p><img src="fvwm3-1.png" border="0"></p>
<p><img src="fvwm3.png" border="0"></p>
<p><img src="fvwm4.png" border="0"></p>
<p><img src="fvwm5.png" border="0"></p>
<p><img src="fvwm6.png" border="0"></p>
<p><img src="fvwm7.png" border="0"></p>

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
