<?php
//--------------------------------------------------------------------
//-  File          : fvwm-web/fvwm-logo/index.php                     
//-  Project       : Fvwm Homepage                                    
//-  Date          : Mon Jan 12 21:08:37 2004                         
//-  Author        : Uwe Pross                                        
//--------------------------------------------------------------------
$rel_path = "..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if (strlen("$navigation_check") == 0) include($rel_path."/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM Logo";
$heading        = "FVWM Logo";
$link_name      = "FVWM Logo";
$link_picture   = "pictures/icons/logo";
$parent_site    = "news";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "logo";

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

<?php decoration_window_start("The FVWM Logo", "100%", ""); ?>
<p>
	Here you can download some versions of the new FVWM-logo. Soon there will be more.
</p>

<h3>Original</h3>
<img src="fvwm-logo-black-transparent.png" width="80%" border="0" alt="">

<h3>Chrome style</h3>
<img src="fvwm-logo-chrom.png" width="80%" border="0" alt="">

<?php decoration_window_end(); ?>
