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
// load some global definitions
//--------------------------------------------------------------------
include_once($rel_path."/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Logo Competition - Ludovic Recourchines logos";
$heading        = "FVWM - Logo Competition - Ludovic Recourchines logos";
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

<?php decoration_window_start("By Ludovic Recourchines", "100%", ""); ?>

<p>
<!-- 
From: ludox <ludorec@wanadoo.fr>
Date: Wed, 11 Jun 2003 01:25:04 +0200
To: fvwm-logo@lists.sourceforge.net
Subject: [FVWM-LOGO] Logo bis...
-->
Hi from France,
  
Logos are simply but not too bad they seems.

My name is Ludovic Recourchines.

On the Pic's ones, it is my Cat, so no problem for rights.
</p>

<p><img src="F5.png" width="200" height="120"></p>

<p><img src="F6.png" width="200" height="120"></p>

<p><img src="LogoF.png" width="349" height="226"></p>

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
