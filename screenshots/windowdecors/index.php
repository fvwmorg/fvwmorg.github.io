<?php
//--------------------------------------------------------------------
//-  File          : screenshots/windowdecors.php
//-  Project       : FVWM Home Page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

$rel_path = "../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if( ! strlen("$navigation_check") ) include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Window Decoration Screenshots";
$link_name      = "Window Decoration Screenshots";
$short_name     = "Window Decors";
$link_picture   = "pictures/icons/screenshots_decor";
$parent_site    = "screenshots";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "windowdecors";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if( strlen("$navigation_check") > 0 ) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if( strlen("$site_has_been_loaded") == 0 ) {
  $site_has_been_loaded = "true";
  include(sec_filename("$layout_file"));
  exit();
}
?>

<?php decoration_window_start("Window decorations - vector buttons"); ?>

  <p>
    FVWM provides a variety of ways to decorate the buttons in the title
    bar.  Vector buttons are images drawn using the buttons shadow and
    highlight colors.  This page shows some of the vector buttons
    that have been contributed to the project.
  </p>
  <p>
    Click on the image to view the file that drew that titlebar or
    shift click to download the file.
  </p>
  <table border="0" cellpadding="5" summary="">
    <tr><td>
	<a href="DecorDemo1.fvwmrc"><img src="DecorDemo1.gif"
					 alt="Collection 1" border="1"></a></td></tr>
    <tr><td>
	<a href="DecorDemo2.fvwmrc"><img src="DecorDemo2.gif"
					 alt="Collection 2" border="1"></a></td></tr>
    <tr><td>
	<a href="DecorDemo3.fvwmrc"><img src="DecorDemo3.gif"
					 alt="Collection 3" border="1"></a></td></tr>
    <tr><td>
	<a href="DecorDemo4.fvwmrc"><img src="DecorDemo4.gif"
					 alt="Collection 4" border="1"></a></td></tr>
    <tr><td>
	This next one uses the pixel offset feature from the fvwm 2.5.x beta series.
	Be patient now...</td></tr>
    <tr><td>
	<a href="DecorDemo5.fvwmrc"><img src="DecorDemo5.gif"
					 alt="Collection 5" border="1"></a></td></tr>
  </table>
  If you have a vector button that you would like to contribute
  you can mail it to fvwm-workers@fvwm.org.
  <p>
    Jos van Riswick has created a Perl script that lets you use xfig
    to design your fvwm vector buttons and covert them to fvwm vector
    buttons.  You can get it
    <a href="http://www.xs4all.nl/~josvanr/eps2vector.pl">here</a>.
  </p>

<?php decoration_window_end(); ?>
