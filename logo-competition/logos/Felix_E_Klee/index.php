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
$title          = "FVWM - Logo Competition - Felix E. Klee logos";
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

<?php decoration_window_start('Logos by Felix E. Klee', "100%", ""); ?>
<!--
Date: Sat, 31 May 2003 22:23:29 +0200
From: "Felix E. Klee" <felix.klee@inka.de>
To: fvwm-logo@lists.sourceforge.net
Subject: [FVWM-LOGO] Some logos
User-Agent: KMail/1.5.1

Hi,
-->
I created some logos for the Logo Competition. You can find them on

<p><a href="http://sites.inka.de/klee/fvwm/logos/index.html">
http://sites.inka.de/klee/fvwm/logos/index.html</a></p>

Note that they are all together in one big image file and I *do not* want
this file to be split up for now. I plan, however, to provide separate
versions of the logos before the voting process begins.
<!--
Regards and happy birthday to FVWM,
-->

<p class=centered><img src="logos.png">

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
