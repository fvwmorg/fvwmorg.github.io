<?php
//--------------------------------------------------------------------
//-  File          : screenshots/menus/index.php
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
$title          = "FVWM - Menu Screenshots";
$link_name      = "Menu Screenshots";
$link_picture   = "pictures/icons/screenshots_menu";
$parent_site    = "screenshots";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "menus";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if( strlen("$navigation_check") > 0 ) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if( strlen("$site_has_been_loaded") == 0 ) {
  $site_has_been_loaded = "true";
  if( strlen($layout) > 0 ) {
    $file = $rel_path."/layout_".$layout.".inc";
    if( file_exists($file) ) $layout_file = $file;
  }
  include(sec_filename("$layout_file"));
  exit();
}
?>

<?php decoration_window_start("Sample menus"); ?>

  <p>
    FVWM provides a variety of ways to decorate your menus.
    This page shows sample menus
    that have been contributed to the project.
    Click on the menu to download the commands needed to
    configure the menu.
  </p>
  <table border="0" cellspacing="5" cellpadding="5" frame="void" rules="rows" 
         summary="fvwm screenshots" class="screenshots">
    <tr valign="top">
      <td>
	<a href="BlueMarble.fvwmrc"><img src="BlueMarble.gif"
					 alt="Blue Marble Menu" border="0"></a></td>
      <td>
	Sample menu submitted by Dan Espen using background pixmaps.
	Click here for
	the <a href="weird10dark.xpm">background pixmap</a>.
      </td>
    </tr>
    
    <!-- Julien Coron - submitted Feb 9, 2003 -->
    <tr valign="top"><td>
	<a href="JulienCoron-menu.fvwmrc"><img src="JulienCoron-menu.png"
					       alt="Julien Coron Menu" border="0"></a></td>
      <td>
	Sample menu submitted by Julien Coron.
	The pixmaps are available
	the <a href="http://julien.coron.free.fr/my_icons/">here</a>.
      </td>
    </tr>
  </table>
  <p>
    If you have a sample menu that you would like to contribute
    you can mail it to fvwm-workers@fvwm.org.
    The sample menu must show one item selected, and one item grayed
    out.  A grayed out menu item can be created by including a "Delete"
    selection and bring the menu up on a window that sets the
    do not delete property.  FvwmTalk can be used for this.
  </p>

<?php decoration_window_end(); ?>
