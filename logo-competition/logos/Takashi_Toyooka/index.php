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
include($rel_path."/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Logo Competition - Takashi Toyooka logos";
$heading        = "FVWM - Logo Competition - Takashi Toyooka logos";
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

<?php decoration_window_start("By Takashi Toyooka", "100%", ""); ?>

<p>
<?php 
// From: Takashi Toyooka <ttoyooka@pobox.com>                                         
// Date: Sun, 31 Aug 2003 13:26:53 -0400                                              
// To: fvwm-logo@lists.sourceforge.net                                                
// Subject: [FVWM-LOGO] Last-minute Logo Competition Entry                            
?>

<p><img src="banner-3d.png"></p>
<p><img src="banner-sml-3d.png"></p>
<p><img src="banner-sml-black.png"></p>
<p><img src="banner-sml-white.png"></p>
<p><img src="bannerbar-flat.png"></p>
<p><img src="icon100-3d.png"></p>
<p><img src="icon100-flat.png"></p>
<p><img src="icon16-flat-black.png"></p>
<p><img src="icon16-flat-white.png"></p>
<p><img src="icon16-flat.png"></p>
<p><img src="icon16-level-black.png"></p>
<p><img src="icon16-level-white.png"></p>
<p><img src="icon16-level.png"></p>
<p><img src="icon32-3d.png"></p>
<p><img src="icon32-flat.png"></p>

<p>
Takashi's logo page:
<a href="http://pages.ca.inter.net/~ttoyooka/takashi/fvwm-logo/">http://pages.ca.inter.net/~ttoyooka/takashi/fvwm-logo/</a>
</p>

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
