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
$title          = "FVWM - Logo Competition - Alex Wallis logos";
$heading        = "FVWM - Logo Competition - Alex Wallis logos";
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

<?php decoration_window_start("By Alex Wallis", "100%", ""); ?>

<p>
<?php 
// From: Alex Wallis <awol@prepaidonline.com.au>
// Date: Thu, 17 Jul 2003 01:51:25 +0930
// To: fvwm-logo@lists.sourceforge.net
// Subject: [FVWM-LOGO] 6 New logo entries!
?>
Not having a clue as to what I was doing, I played about with the gimp
for awhile, and would to submit the half a dozen images at
<a src="http://awol.no-ip.org/demo-logo.html">http://awol.no-ip.org/demo-logo.html</a>
for consideration in the
competition.
You have been warned! I'm only doing it for the money...
</p>

<p><img src="fvwm_logo_brick.png"></p>
<p><img src="fvwm_logo_fiery_shadow.png"></p>
<p><img src="fvwm_logo_fire.png"></p>
<p><img src="fvwm_logo_rainbow.png"></p>
<p><img src="fvwm_logo_shadow.png"></p>
<p><img src="fvwm_logo_transparent.png"></p>

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
