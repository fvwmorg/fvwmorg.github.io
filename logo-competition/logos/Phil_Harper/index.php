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
$title          = "FVWM - Logo Competition - Phil Harper logos";
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

<?php decoration_window_start("By Phil Harper", "100%", ""); ?>

<p>I've got some submissions for the contest, tiger might get resubmitted
when I've worked out how to draw stripes on the tale that don't look crap. :)

<p><img src="tiger.png">
<p><img src="feeble.png">
<p><img src="black.png">
<p><img src="plain.png">

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
