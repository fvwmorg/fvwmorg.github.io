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
if(!isset($navigation_check)) include_once($rel_path.'/definitions.inc'); 

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
  include_once(sec_filename("$layout_file"));
  exit();
}

decoration_window_start("FVWM Documentation");

?>

  <center>
    <table align=center cellpadding="10" cellspacing="0" border="0" 
	   width="90%" frame="void" rules="none" summary="">
      <tr>
	<td width="25%" align="center" valign="middle">
		<a href="../doc/unstable/index.html">
		<img src="documentation_htmldoc_overview.jpg" border="0"><br/>
		HTML Documentation</a>
	</td>
	<td width="25%" align="center" valign="middle">
		<a href="<?php echo conv_link_target('faq/index.php');?>">
		<img src="documentation_faq_overview.jpg" border="0"><br/>
		Frequently Asked Questions</a>
	</td>
	<td width="25%" align="center" valign="middle">
		<a href="<?php echo conv_link_target('manpages/index.php');?>">
		<img src="documentation_manpages_overview.jpg" border="0"><br/>
		Manual Pages</a>
	</td>
	<td width="25%" align="center" valign="middle">
		<a href="<?php echo conv_link_target('developers.php');?>">
		<img src="documentation_developers_overview.jpg" border="0"><br/>
		Developer Information</a>
	</td>
      </tr>
    </table>
  </center>

<?php decoration_window_end(); ?>

