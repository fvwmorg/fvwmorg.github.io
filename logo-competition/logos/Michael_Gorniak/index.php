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
$title          = "FVWM - Logo Competition - Michael Gorniak logos";
$heading        = "FVWM - Logo Competition - Michael Gorniak logos";
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

<?php decoration_window_start("By Michael Gorniak", "100%", ""); ?>

<p>
<!--
Date: Sat, 26 Apr 2003 21:28:30 +1000
From: "Mike" <luckysevendesign@optusnet.com.au>
To: <fvwm-logo@lists.sourceforge.net>
Subject: [FVWM-LOGO] logo suggestions
X-Mailer: Microsoft Outlook Express 6.00.2600.0000

Hi VFWM staff,
-->
Here are several logo suggestions together, please tell me if you would like
them bigger and/or seperated. They were completed in vector graphics so
they can be any size or shape. As you can i see i left a little feline theme
in some of them in case you really want the V in VFWM to remain feline!

p.s. I will submit several more within a few weeks.
<!--

thanks, Michael Gorniak
-->
</p>

<p><img src="fvwm-logos.png">

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
