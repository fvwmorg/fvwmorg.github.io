<?php
//--------------------------------------------------------------------
//-  File          : customize_theme.php                                 
//-  Project       : Fvwm Home Page                                   
//--------------------------------------------------------------------

// hide from navgen while development
// if(isset($navigation_check)) return;

if(!isset($rel_path)) $rel_path = "./..";

// start output buffering - only needed if debuging info is transmitted
ob_start();

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if(!isset($navigation_check)) include_once($rel_path."/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "Customize your fvwm web site";
$heading        = "Customize your fvwm web site";
$link_name      = "Customize";
$link_picture   = "pictures/icons/customize_theme";
$parent_site    = "links";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "customize_theme";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

//--------------------------------------------------------------------
// check if settings should be changed
//--------------------------------------------------------------------
include_once("./theme_descriptions_helper.inc");

if(!isset($site_has_been_loaded)) {
    // create a theme description helper object
    $tdh = new Theme_Descriptions_Helper($theme);
    $tdh->set_user_settings();
}

// finish output buffering
ob_end_flush();

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
  $site_has_been_loaded = "true";
  include_once(sec_filename($layout_file));
  exit();
}

decoration_window_start("Please make your selection");

// debuging - show the whole description tree 
// $tdh->insert_theme_description();
// echo $rel_path;
?>
<h2>Here you can change the theme of this web site</h2>

<table summary="">
  <tr>
    <td>
      <form action="<?php echo $requested_file;?>" method="post">
        <input type="hidden" name="cutomize_form" value="true"> 
        <table cellpadding="5" cellspacing="0" border="0" align="left" valign="middle" width="0" summary="">
	  <tr>
	    <td>Method to pass this settings:</td>
	    <td><?php $tdh->insert_propagation_method_list(); ?></td>
	    <td warp>Choose cookie remember your settings next time you visit the fvwm home page.</td>      
	  </tr>
	  <tr>
	    <td>Use another theme for this page:</td>
	    <td><?php $tdh->insert_avail_theme_list(); ?></td>
	    <td><input type="submit" name="theme_change" value="Use this theme">&nbsp;&nbsp;<input type="submit" name="clear_cookies" value="Clear cookies"></td>
	  </tr>
<!--	  <tr>-->
<!--	    <td colspan="3"><h2>Options for theme &quot;<?php echo $tdh->get_selected_theme_name();?>&quot;</h2></td>-->
<!--	  </tr>-->
	  <?php $tdh->insert_theme_option_list(); ?> 
<!--	    <tr>-->
<!--	      <td colspan="3" align="center" class="windowcontents">-->
<!--		<input type="submit" name="theme_select" value="Use these settings">-->
<!--		<input type="reset" name="theme_reset" value="Reset to previous values">-->
<!--		<input type="submit" name="clear_cookies" value="Clear cookies">-->
<!--	      </td>-->
<!--	    </tr>-->
	</table>
      </form>
    </td>
  </tr>
</table>

<?php
  decoration_window_end();
  ?>
  