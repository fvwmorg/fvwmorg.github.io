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
$title          = "FVWM - Logo Competition - t'mo logos";
$heading        = "FVWM - Logo Competition - t'mo logos";
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

<?php decoration_window_start("By t'mo", "100%", ""); ?>

<?php 
// From: Daniel J Parks <dnsparks@juno.com> 
// Date: Sun, 10 Aug 2003 00:26:26 -0400
// To: fvwm-logo@lists.sourceforge.net
// Subject: [FVWM-LOGO] logo submissions...

// If you need to contact me, please reply to either this address or my
// alternate address, tapostrophemo@yahoo.com . However, when adding my
// entries to the logo competition site, please use my online pseudonym -
// "t'mo". Thank you.
?>
<p><img src="fvwmLogoCatHoriz.png"></p>
<p><img src="fvwmLogoGlowingChromelike.png"></p>
<p><img src="fvwmLogoGlowingChromelike200x120.png"></p>
<p><img src="fvwmLogoGlowingChromelike24x64.png"></p>
<p><img src="fvwmLogoGlowingChromelike300x180.png"></p>
<p><img src="fvwmLogoGlowingChromelike300x180bw.png"></p>

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
