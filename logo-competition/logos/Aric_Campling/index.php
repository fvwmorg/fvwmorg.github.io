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
$title          = "FVWM - Logo Competition - Aric Campling logos";
$heading        = "FVWM - Logo Competition - Aric Campling logos";
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

<?php decoration_window_start("By Aric Campling", "100%", ""); ?>

<p>
<!-- 
From: "A. Campling" <denim@hosers.org>
Date: Sat, 7 Jun 2003 23:04:19 -0400 (EDT)
To: fvwm-logo@lists.sourceforge.net
Subject: [FVWM-LOGO] Submission  
-->
Here's one.  That's my own cat back there.  She luvs linux, too.
<!--
URL: http://killerfrog.hopto.org/~ruyduck/felineinside2.png
it's 270x180, comes out at about 41.4Mb.  I know it's a bit big, hope it
will still qualify.

I can provide high-resolution, uncompressed TIF on request.  Thanks!

- Aric Campling
-->
</p>

<!--<p><img src="logo-white_bg.png" width="270" height="180"></p>-->
<p><img src="logo-transparent_bg.png" width="300" height="180"></p>

<p><img src="felineinside.png" width="300" height="200"></p>

<p><img src="logo-gradient_bg.png" width="300" height="180"></p>

<p>
weighing in at 34Kb, a different concept with a clear background.  Thanks.
Colors on this one are flexible, I may change them around a bit and see
what else I can come up with.</p>

<p><img src="linecat1.png" width="300" height="180"></p>

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
