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
$title          = "FVWM - Logo Competition - Anna MacLachlan logos";
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

<?php decoration_window_start('By
<a href="http://gug.sunsite.dk/gallery.php?artist=32">Anna MacLachlan</a>
(VosVuur)', "100%", ""); ?>

<p>
<!--
Date: Thu, 01 May 2003 05:03:04 -0400
From: VosVuur@netscape.net (VosVuur)
To: fvwm-logo@lists.sourceforge.net
Subject: [FVWM-LOGO] entry
X-Mailer: Atlas Mailer 2.0

[-- Attachment #1 --]
[-- Type: text/plain, Encoding: 8bit, Size: 0.6K --]

:)
-->
Heres an entry for the contest, all requested formats are done... pasted all
of them onto 1 transparent bg... cut at will... the 300x180 is unfortunately 49k
bs (as opposed to maximal 40kbs), I'm working on getting that down furthur.
<!--
not so far over tho :)
cheers
VosVuur
-->
</p>

<p class=centered><img src="jungle-set.png">

<p>Another submission... Clearly FVWM... :)

<p class=centered><img src="clearly-fvwm.png">

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
