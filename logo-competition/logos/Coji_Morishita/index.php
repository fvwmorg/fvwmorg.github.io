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
// load some global definitions
//--------------------------------------------------------------------
include($rel_path."/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Logo Competition - Coji Morishita logos";
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
?>

<?php decoration_window_start('By
<a href="http://www.underforest.com/underforest/profile.html">Coji Morishita</a>
(COS)', "100%", ""); ?>

<p>
<!--
Date: Tue, 20 May 2003 21:42:40 +0900 (JST)  
From: coz@underforest.com
To: fvwm-logo@lists.sourceforge.net
Subject: [FVWM-LOGO] Works for FVWM Logo Competition
X-Mailer: Mew version 3.1.53 on Emacs 21.2 / Mule 5.0 (SAKAKI)
     
Dear Sirs,
-->
Here is my
<a href="http://www.underforest.com/fvwm_logo_competition/">work</a>.
<!--

- 
COZ  
  
underforest design
http://www.underforest.com/
-->
</p>

<table width="100%" border=0>
<tr align=center><td><img src="fvwm_banner.png">
<tr align=center><td><img src="fvwm_logo.png">
<tr align=center><td><img src="fvwm_logo_plus.png">
<tr align=center><td><img src="fvwm_sym_logo.png">
<tr align=center><td><img src="fvwm_sbanner_blue.png">
<tr align=center><td><img src="fvwm_sbanner_green.png">
<tr align=center><td><img src="fvwm_sbanner_red.png">
<tr align=center><td><img src="fvwm_sbanner_yellow.png">
</table>

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
