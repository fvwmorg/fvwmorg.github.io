<?php
//--------------------------------------------------------------------
//-  File          : documentation/manpages/index.php
//-  Project       : FVWM Home Page
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

// This is a static file for now, need not be really autogenerated.

$rel_path = "../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if(!isset($navigation_check)) include_once($rel_path."/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Man pages";
$heading        = "Man pages";
$link_name      = "Man pages";
$link_picture   = "pictures/icons/doc_manpages";
$parent_site    = "documentation";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "manpages";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
	$site_has_been_loaded = "true";
	include_once(sec_filename($layout_file));
	exit();
}
?>

<?php decoration_window_start("Manual pages"); ?>

<p>Please choose the branch you are interesting in:
<ul>
  <li><a href="<?php echo conv_link_target('stable/');?>">2.6.x (stable)</a>
  <li><a href="<?php echo conv_link_target('unstable/');?>">2.7.x (unstable)</a>
</ul>

<hr>

<p>If you want to create your own modules, you may also read about
the <a href="<?php echo conv_link_target('../perllib/');?>">Perl library</a>.

<?php decoration_window_end(); ?>
