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
include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Documentation";
$link_name      = "Docs";
$link_picture   = "pictures/icons/documentation";
$parent_site    = "top";
$child_sites    = array("faq", "manpages", "developers");
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "documentation";

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

decoration_window_start("Fvwm Documentations");

?>

  <center>
    <table cellpadding="10" cellspacing="0" border="0" 
	   width="90%" frame="void" rules="none" summary="">
      <tr>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('faq.php');?>"><img src="documentation_faq_overview.jpg" border="0"></a></td>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('developers.php');?>"><img src="documentation_developers_overview.jpg" border="0"></a></td>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('manpages/index.php');?>"><img src="documentation_manpages_overview.jpg" border="0"></a></td>
      </tr>
      <tr>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('faq.php');?>">Frequently Asked Questions</a></td>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('developers.php');?>">Developer Information</a></td>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('manpages/index.php');?>">Fvwm Manpages</a></td>
      </tr>
    </table>
  </center>

<?php decoration_window_end(); ?>

