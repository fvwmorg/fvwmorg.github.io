<?php
//--------------------------------------------------------------------
//-  File          : @FILENAME@
//-  Project       : FVWM Home page
//-  Programmer    : Logo Competitor
//--------------------------------------------------------------------

$rel_path = "..";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if (strlen("$navigation_check") > 0) return;

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include("$rel_path/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Logo Competition - New logos";
$heading        = "FVWM - Logo Competition - New logos";
$link_name      = "Logo Competition";
$link_picture   = "pictures/icons/logo_competition";
$parent_site    = "news";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "logo_competition";

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if (strlen("$site_has_been_loaded") == 0) {
	$site_has_been_loaded = "true";
	include(sec_filename($layout_file));
	exit();
}
?>

<?php decoration_window_start("By Michael Gorniak", "", "", 0); ?>

<a href="<?php echo conv_link_target('logos/Michael_Gorniak/index.php');
?>" class="nohilight"><img src="logos/Michael_Gorniak/fvwm-logos.png"
border="0" hspace="0" vspace="0" width="269" height="252"></a>

<?php decoration_window_end(); ?>

<?php decoration_window_start("By David Drummond", "", "", 0); ?>

<a href="<?php echo conv_link_target('logos/David_Drummond/index.php');
?>" class="nohilight"><img src="logos/David_Drummond/yellow_flower_fvwm_logo.png"
border="0" hspace="0" vspace="0"></a>

<?php decoration_window_end(); ?>

<?php decoration_window_start("By Ian Remmler", "", "", 0); ?>

<a href="<?php echo conv_link_target('logos/Ian_Remmler/index.php');
?>" class="nohilight"><img src="logos/Ian_Remmler/3d.png"
border="0" hspace="0" vspace="0"></a>

<p>
<a href="<?php echo conv_link_target('logos/Ian_Remmler/index.php');
?>" class="nohilight"><img src="logos/Ian_Remmler/contrast.png"
border="0" hspace="0" vspace="0"></a>

<p>
<a href="<?php echo conv_link_target('logos/Ian_Remmler/index.php');
?>" class="nohilight"><img src="logos/Ian_Remmler/future.png"
border="0" hspace="0" vspace="0"></a>

<p>
<a href="<?php echo conv_link_target('logos/Ian_Remmler/index.php');
?>" class="nohilight"><img src="logos/Ian_Remmler/groovy-3d.png"
border="0" hspace="0" vspace="0"></a>

<p>
<a href="<?php echo conv_link_target('logos/Ian_Remmler/index.php');
?>" class="nohilight"><img src="logos/Ian_Remmler/block.png"
border="0" hspace="0" vspace="0"></a>

<?php decoration_window_end(); ?>

<?php decoration_window_start("By Tian", "", "", 0); ?>

<a href="<?php echo conv_link_target('logos/Tian/index.php');
?>" class="nohilight"><img src="logos/Tian/fvwm_logo.png"
border="0" hspace="0" vspace="0" width="266" height="143"></a>

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('index.php');?>">index</a>.</p>
