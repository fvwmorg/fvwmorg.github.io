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
$title          = "FVWM - Logo Competition - Tian logos";
$heading        = "FVWM - Logo Competition - Tian logos";
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

<?php decoration_window_start('By <a href="http://www.c-sait.net/">Tian</a>',
"100%", ""); ?>
<!--
From: tian-misc@c-sait.net
-->
<p>
The logos can be seen at
<a href="http://www.c-sait.net/fvwm/">http://www.c-sait.net/fvwm/</a>,
they were all made using <a href="http://gimp.org/">The Gimp</a>.

<p>I tried to make simple logos but with a modern design. 
They look like they were made using a construction set.
Square shapes represent the windows managed by fvwm. 

<p>This first one is basic. It introduces the logo.
<p><img src="logo_basic.png">

<p>Some color variations and shading effects.
<p><img src="logo_shaded.png">

<p>Sunny version.
<p><img src="logo_sunny.png">

<p>In next logo, F could mean Floating. It is evokating the sea. 
<p><img src="logo_float.png" width="251" height="102">

<p>The same one with a background representing water on which the 
logo is floating.
<p><img src="logo_float_bg.png" width="251" height="102">

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
