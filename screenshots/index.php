<?php
//--------------------------------------------------------------------
//-  File          : screenshots/index.php
//-  Project       : FVWM Home Page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//-  Last modified : <14.04.2003 22:10:36 uwe>
//--------------------------------------------------------------------

$rel_path = "..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Screenshots";
$link_name      = "Screenshots";
$link_picture   = "pictures/icons/screenshots";
$parent_site    = "top";
$child_sites    = array("desktops", "windowdecors" ,"menus");
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "screenshots";

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

<?php decoration_window_start("FVWM Screenshots"); ?>
  <center>
    <table cellpadding="10" cellspacing="0" border="0" 
	   width="90%" frame="void" rules="none" summary="">
      <tr>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('desktops.php');?>"><img src="screenshots_desktop_overview.jpg" border="0"></a></td>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('windowdecors/index.php');?>"><img src="screenshots_windowdecorations_overview.jpg" border="0"></a></td>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('menus/index.php');?>"><img src="screenshots_menus_overview.jpg" border="0"></a></td>
      </tr>
      <tr>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('desktops.php');?>">Desktop screenshots</a></td>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('windowdecors/index.php');?>">Window decoration screenshots</a></td>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('menus/index.php');?>">Menu screenshots</a></td>
      </tr>
    </table>
  </center>
<?php decoration_window_end(); ?>
