<?php
//--------------------------------------------------------------------
//-  File          : documentation/index.php
//-  Project       : FVWM Home Page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

$rel_path = "..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if(!isset($navigation_check)) include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Documentation";
$link_name      = "Documentation";
$link_picture   = "pictures/icons/documentation";
$parent_site    = "top";
$child_sites    = array("faq", "manpages", "developers");
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "documentation";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
  $site_has_been_loaded = "true";
  include(sec_filename("$layout_file"));
  exit();
}

decoration_window_start("FVWM Documentation");

?>

  <center>
    <table align=center cellpadding="10" cellspacing="0" border="0" 
	   width="90%" frame="void" rules="none" summary="">
      <tr>
	<td width="30%" align="center" valign="middle"><a href="<?php echo conv_link_target('faq/index.php');?>"><img src="documentation_faq_overview.jpg" border="0"></a></td>
	<td width="30%" align="center" valign="middle"><a href="<?php echo conv_link_target('manpages/index.php');?>"><img src="documentation_manpages_overview.jpg" border="0"></a></td>
	<td width="30%" align="center" valign="middle"><a href="<?php echo conv_link_target('developers.php');?>"><img src="documentation_developers_overview.jpg" border="0"></a></td>
      </tr>
      <tr>
	<td width="30%" align="center" valign="middle"><a href="<?php echo conv_link_target('faq/index.php');?>">Frequently Asked Questions</a></td>
	<td width="30%" align="center" valign="middle"><a href="<?php echo conv_link_target('manpages/index.php');?>">Manual Pages</a></td>
	<td width="30%" align="center" valign="middle"><a href="<?php echo conv_link_target('developers.php');?>">Developer Information</a></td>
      </tr>
    </table>
  </center>

<?php decoration_window_end(); ?>

