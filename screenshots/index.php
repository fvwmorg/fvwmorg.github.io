<?php
//--------------------------------------------------------------------
//-  File          : screenshots/index.php
//-  Project       : FVWM Home Page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

$rel_path = "..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if(!isset($navigation_check)) include_once($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Screenshots";
$link_name      = "Screenshots";
$link_picture   = "pictures/icons/screenshots";
$parent_site    = "top";
$child_sites    = array("screenshots_desks", "screenshots_windowdecors" ,"screenshots_menus", "screenshots_vectorbuttons");
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "screenshots";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
  $site_has_been_loaded = "true";
  include_once(sec_filename("$layout_file"));
  exit();
}
?>

<?php decoration_window_start("FVWM Screenshots"); ?>
  <center>
    <table cellpadding="10" cellspacing="0" border="0" 
	   width="90%" frame="void" rules="none" summary="">
      <tr>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('desktops/index.php');?>"><img src="screenshots_desktop_overview.jpg" border="0"></a></td>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('windowdecors/index.php');?>"><img src="screenshots_windowdecorations_overview.jpg" border="0"></a></td>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('menus/index.php');?>"><img src="screenshots_menus_overview.jpg" border="0"></a></td>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('vectorbuttons/index.php');?>"><img src="screenshots_vectorbuttons_overview.jpg" border="0"></a></td>
      </tr>
      <tr>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('desktops/index.php');?>">Desktop screenshots</a></td>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('windowdecors/index.php');?>">Window decoration screenshots</a></td>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('menus/index.php');?>">Menu screenshots</a></td>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('vectorbuttons/index.php');?>">Vectorbuttons screenshots</a></td>
      </tr>
    </table>
  </center>
<?php decoration_window_end(); ?>
