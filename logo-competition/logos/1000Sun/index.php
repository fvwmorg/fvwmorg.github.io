<?php
//--------------------------------------------------------------------
//-  File          : @FILENAME@
//-  Project       : FVWM Home page
//-  Programmer    : Logo Competitor
//--------------------------------------------------------------------

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

$rel_path = "../../..";

//--------------------------------------------------------------------
// load some
//--------------------------------------------------------------------
include_once($rel_path."/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Logo Competition - 1000sun logos";
$heading        = "FVWM - Logo Competition - 1000sun logos";
$link_name      = "Logo Competition";
$link_picture   = "pictures/icons/logo_competition";
$parent_site    = "news";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "logo_competition";

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
	$site_has_been_loaded = "true";
	include(sec_filename($layout_file));
	exit();
}

if( file_exists("./../color_select.inc") ) include("./../color_select.inc");
?>

<?php decoration_window_start("By 1000sun", "100%", ""); ?>

<?php 
// From: max@goabase.orgdns.org                     
// Reply-To: maxxxb@gmx.net                         
// Date: Wed, 3 Sep 2003 00:54:53 +0200             
// To: Uwe Pross <keinFruehstuecksfleisch@gmx.net>  
?>
<p><img src="fvwm2_FIN_3D_black.png"></p>
<p><img src="fvwm2_FIN_emblem_1.png"></p>
<p><img src="fvwm2_FIN_emblem_2.png"></p>
<p><img src="fvwm2_FIN_emblem_3.png"></p>
<p><img src="fvwm2_FIN_flat.png"></p>
<p><img src="fvwm2_FIN_gimmed.png"></p>
<p><img src="fvwm2_FIN_gimmed_no_border.png"></p>
<p>
Please visit the author's logo page to see further variants of this logos:
<a href="http://nirvana.orgdns.org/fvwm-logos/">http://nirvana.orgdns.org/fvwm-logos/</a>
</p>

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
