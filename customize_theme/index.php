<?php
//--------------------------------------------------------------------
//-  File          : customize_theme.php                                 
//-  Project       : Fvwm Home Page                                   
//--------------------------------------------------------------------

// hide from navgen while development
if (strlen("$navigation_check") > 0) return;

if(strlen($rel_path) == 0) $rel_path = "./..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include("$rel_path/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "Customize your fvwm web site";
$heading        = "Customize your fvwm web site";
$link_name      = "Customize";
$link_picture   = "pictures/icons/customize_theme";
$parent_site    = "home";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "customize_theme";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if (strlen("$navigation_check") > 0) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if (strlen("$site_has_been_loaded") == 0) {
  $site_has_been_loaded = "true";
  include(sec_filename($layout_file));
  exit();
}

include_once("./theme_descriptions_helper.inc");

// create a theme description helper object
$tdh = new Theme_Descriptions_Helper($theme);

decoration_window_start("Please make your selection");

// debuging - show the whole description tree 
// $tdh->insert_theme_description();

?>

<form action="<?php echo $requested_file;?>" method="POST" enctype="text/plain">
  <table cellpadding="0" cellspacing="5" border="0" align="left" valign="middle" width="0" summary="">
    <tr>
      <td>Available Themes</td>
      <td><select name="theme" size="1">
	    <?php $tdh->insert_avail_theme_list(); ?>
	  </select></td>
    </tr>
  </table>
</form>

<br>
<?php
decoration_window_end();
?>
