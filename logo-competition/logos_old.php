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
if(isset($navigation_check)) return;

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include_once("$rel_path/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Logo Competition - Old logos";
$heading        = "FVWM - Logo Competition - Old logos";
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
?>

<?php decoration_window_start("Cat Thing", "", "", 0); ?>
<a href="<?php echo conv_link_target('logos/old/cat_thing_framed.png');?>" class="nohilight"><img
src="logos/old/cat_thing.png" border="0" hspace="0" vspace="0"></a>
<?php decoration_window_end(); ?>

<?php decoration_window_start("Red Cursive", "", "", 0); ?>
<a href="<?php echo conv_link_target('logos/old/red_cursive_framed.png');?>" class="nohilight"><img
src="logos/old/red_cursive.png" border="0" hspace="0" vspace="0"></a>
<?php decoration_window_end(); ?>

<?php decoration_window_start("Tiger Tail", "", "", 0); ?>
<a href="<?php echo conv_link_target('logos/old/tiger_tail.png');?>" class="nohilight"><img
src="logos/old/tiger_tail.png" border="0" hspace="0" vspace="0"></a>
<?php decoration_window_end(); ?>

<?php decoration_window_start("Tiger Head", "", "", 0); ?>
<a href="<?php echo conv_link_target('logos/old/tiger_head.png');?>" class="nohilight"><img
src="logos/old/tiger_head.png" border="0" hspace="0" vspace="0"></a>
<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('index.php');?>">index</a>.</p>
