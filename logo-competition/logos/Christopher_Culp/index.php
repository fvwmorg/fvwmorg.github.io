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
// load some
//--------------------------------------------------------------------
include($rel_path."/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Logo Competition - Christopher Culp logos";
$heading        = "FVWM - Logo Competition - Christopher Culp logos";
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

<?php decoration_window_start("By Christopher Culp", "100%", ""); ?>

<p>
<?php 
// From: Christopher Culp <culpaz@yahoo.com>
// Date: Tue, 8 Jul 2003 12:35:08 -0700 (PDT)
// To: fvwm-logo@lists.sourceforge.net
// Subject: [FVWM-LOGO] logo contest
?>
FVWM, Thanks for the opportunity to design your logo. This is my
submission based on what I have read about your company. The logo
involve a few element such as a feline, your name as well as a point
to represent windows. I have attached the file format and size you had
requested as well a little larger version so you could see it a bit
closer. Thanks again, let me know if you have any feedback.
</p>

<p><img src="fvwm.gif" width="400" height="250"></p>

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
