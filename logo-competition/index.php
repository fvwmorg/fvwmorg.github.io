<?php
//--------------------------------------------------------------------
//-  File          : @FILENAME@
//-  Project       : FVWM Home page
//-  Programmer    : Logo Competitor
//--------------------------------------------------------------------

$rel_path = "..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path."/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Logo Competition";
$heading        = "FVWM - Logo Competition";
$link_name      = "Logo Competition";
$link_picture   = "pictures/icons/logo_competition";
$parent_site    = "news";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "logo_competition";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if (strlen("$navigation_check") > 0) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if (strlen("$site_has_been_loaded") == 0) {
	$site_has_been_loaded = "true";
	if (strlen($layout) > 0) {
		$file = "$rel_path/layout_$layout.inc";
		if (file_exists($file)) $layout_file = $file;
	}
	include(sec_filename($layout_file));
	exit();
}
?>

<?php decoration_window_start("New Logo Competition", "100%", ""); ?>

<h2>Welcome to FVWM Logo Competition</h2>

<p>If you like to participate, please read
<?php 
echo '<a href="'.conv_link_target("rules.php").'">the competition rules</a>.';
?>
</p>

<p>The submitted works are linked here.</p>
<?php decoration_window_end(); ?>

<p>
<?php decoration_window_start("View submitted logos", "100%", "", 0); ?>

<div align=center>
<table cellpadding="10" cellspacing="0" border="0"
	width="100%" frame="void" rules="none" summary="">
<tr>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('logos_old.php');?>"><img src="logos_old_overview.png" border="0"></a></td>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('logos_new.php');?>"><img src="logos_new_overview.png" border="0"></a></td>
</tr>
<tr>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('logos_old.php');?>">View Old Logos</a></td>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('logos_new.php');?>">View New Logos</a></td>
</tr>
</table>
</div>

<?php decoration_window_end(); ?>
