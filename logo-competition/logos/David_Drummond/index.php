<?php
//--------------------------------------------------------------------
//-  File          : @FILENAME@
//-  Project       : FVWM Home page
//-  Programmer    : Logo Competitor
//--------------------------------------------------------------------

$rel_path = "../../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path."/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Logo Competition - David Drummond logos";
$heading        = "FVWM - Logo Competition - David Drummond logos";
$link_name      = "Logo Competition";
$link_picture   = "pictures/icons/logo_competition";
$parent_site    = "news";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "logo_competition";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if (strlen($navigation_check) > 0) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if (strlen($site_has_been_loaded) == 0) {
	$site_has_been_loaded = "true";
	include(sec_filename($layout_file));
	exit();
}
?>

<?php decoration_window_start("By David Drummond", "100%", ""); ?>

<p>
<!--
Date: Sun, 27 Apr 2003 08:11:49 +0000
From: "David Drummond" <citonx600@telus.net>
To: fvwm-logo@lists.sourceforge.net
Subject: [FVWM-LOGO] Logo Submission
X-Mailer: Microsoft Outlook Express for Macintosh - 4.01 (295)

I apologize for the file being 49kb, but I don't like compressing files
since it really brings down the quality.
-->
This is a 300 x 180 PNG image
containing a new logo for FVWM.

I will be sumbitting others as right now I just re-did my computer so I
don't have my full taskforce of fonts and images/stock photos at my
fingertips, so there will be a few more.
<!--

On a side note, I have a open-source web design I made and some wallpapers.
If I get them hosted would you like to have a look? I might be able to give
your website a little facelift. :)
-->
</p>

<p><img src="yellow_flower_fvwm_logo.png">

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
