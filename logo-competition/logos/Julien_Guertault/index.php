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
$title          = "FVWM - Logo Competition - Julien Guertault logos";
$heading        = "FVWM - Logo Competition - Julien Guertault logos";
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

<?php decoration_window_start("By Julien Guertault", "100%", ""); ?>

<?php 
// From: Zavie - Julien Guertault <zavie@epita.fr>
// Date: Wed, 27 Aug 2003 08:42:30 +0200
// To: fvwm-logo@lists.sourceforge.net
// Subject: [FVWM-LOGO] The fvwm's feline side...
?>
<p>
Here is my point of view of how should fvwm's logo look like.

There's a full color version, and a black and transparent version. Of
course many details can be changed, I just wanted to insert a cat's   
eye in the logo.
</p>

<p><img src="Feline-Logo-Color.png"></p>
<p><img src="Feline-Logo-Mono.png"></p>

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
