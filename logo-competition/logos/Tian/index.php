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
$title          = "FVWM - Logo Competition - Tian logos";
$heading        = "FVWM - Logo Competition - Tian logos";
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

<?php decoration_window_start('By <a href="http://www.c-sait.net/">Tian</a',
"100%", ""); ?>

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

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
