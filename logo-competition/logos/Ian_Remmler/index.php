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
$title          = "FVWM - Logo Competition - Ian Remmler logos";
$heading        = "FVWM - Logo Competition - Ian Remmler logos";
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

<?php decoration_window_start("By Ian Remmler", "100%", ""); ?>

<p>
<!--
Date: Sun, 27 Apr 2003 14:36:04 -0500
From: Ian Remmler <marmoset@tamu.edu>
To: fvwm-logo@lists.sourceforge.net
Subject: [FVWM-LOGO] A few entries
User-Agent: Mutt/1.5.4i

Hi,

-->
I have created a few logos and put them at
<a href="http://remmler.org/fvwm/">http://remmler.org/fvwm/</a>.
These were all created with vector-based qcad or tgif, so they should
scale nicely (I did do some post-processing in the gimp).  I could
always change colors, add drop shadows, etc., but I concentrated on the
basic shapes.  If anyone has comments or suggestions, please let me
know.  I will probably come up with some more later...
<!--

Thanks for taking a look!
        - Ian.
-->
</p>

<p><img src="3d.png">
<p><img src="contrast.png">
<p><img src="future.png">
<p><img src="groovy-3d.png">
<p><img src="block.png">

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
