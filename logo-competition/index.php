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
if (strlen("$navigation_check") == 0) include($rel_path."/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Logo Competition";
$heading        = "FVWM - Logo Competition";
$link_name      = "Logo Competition";
$link_picture   = "pictures/icons/logo_competition";
$parent_site    = "news";
$child_sites    = array("logo_competition_results1", "logo_competition_results2");
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "logo_competition";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if (strlen($navigation_check) > 0) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if (strlen($site_has_been_loaded) == 0) {
	$site_has_been_loaded = "true";
	include(sec_filename($layout_file));
	exit();
}
?>

<?php decoration_window_start("Overview", "100%", ""); ?>

<h3>The competition is over. The voting was done in two stages:</h3>
<ul>
<li><?php mylink("logos/voting/results1.php", "Here"); ?> are the results of the first stage.</li>
<li><?php mylink("logos/voting/results2.php", "Here"); ?> are the results of the second stage.</li>
</ul>
<?php mylink("../fvwm-logo", "Here"); ?> you can see the new FVWM logo.

<p>
  <?php mylink("rules.php", "Competition rules"); ?>
</p>

<p>
  Submitted logos are linked here.
  You need a modern browser with a good PNG support to view them, like
  Mozilla, Konqueror, Galeon, Netscape, Opera and a number of others.
</p>

<p>
  Most of the logos are transparent, you may change a layout or a css
  to see them on another background.
</p>

<?php decoration_window_end(); ?>

<?php decoration_window_start("View submitted logos", "100%", "", 0); ?>

<div align=center>
<table cellpadding="10" cellspacing="0" border="0"
	width="100%" frame="void" rules="none" summary="">
<tr>
	<td align="center" valign="middle"><a 
        href="<?php echo conv_link_target('logos_new.php');?>" 
        class="nohilight"><img 
          src="logos_new_overview.png" width="204" height="144" border="0" alt="New logos"></a></td>
	<td align="center" valign="middle"><a 
        href="<?php echo conv_link_target('logos_old.php');?>" 
        class="nohilight"><img 
          src="logos_old_overview.png" width="204" height="144" border="0" alt="Old logos"></a></td>
</tr>
<tr>
	<td align="center" valign="middle"><a href="<?php echo
	conv_link_target('logos_new.php');?>">View Competition Logos</a></td>
	<td align="center" valign="middle"><a href="<?php echo conv_link_target('logos_old.php');?>">View Old Logos</a></td>
</tr>
</table>
</div>

<?php decoration_window_end(); ?>
