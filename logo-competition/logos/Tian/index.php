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
$title          = "FVWM - Logo Competition - Tian logos";
$heading        = "FVWM - Logo Competition - Tian logos";
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

<?php decoration_window_start("By Tian", "100%", ""); ?>

<p>
<!--
Date: Mon, 28 Apr 2003 01:38:48 +0200
From: Tian <tian-misc@c-sait.net>
Reply-To: tian-misc@c-sait.net
To: fvwm-logo@lists.sourceforge.net
Subject: [FVWM-LOGO] Logo submission
User-Agent: KMail/1.5

Hello,

-->
Please find my logo here :

<p><a href="http://www.c-sait.net/images/logo_fvwm.png"
>http://www.c-sait.net/images/logo_fvwm.png</a>
<!--

Best regards,

Tian.
-->
</p>

<p><img src="3d.png">
<p><img src="contrast.png">
<p><img src="future.png">
<p><img src="groovy-3d.png">
<p><img src="block.png">

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../logos_new.php');?>">index</a>.</p>
