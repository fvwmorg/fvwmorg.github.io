<?php
//--------------------------------------------------------------------
//-  File          : @FILENAME@
//-  Project       : FVWM Home page
//-  Programmer    : Logo Competitor
//--------------------------------------------------------------------

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if (strlen($navigation_check) > 0) return;

$rel_path = "../../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path."/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Logo Competition - Colin May logos";
$link_name      = "Logo Competition";
$link_picture   = "pictures/icons/logo_competition";
$parent_site    = "news";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "logo_competition";

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if (strlen($site_has_been_loaded) == 0) {
	$site_has_been_loaded = "true";
	include(sec_filename($layout_file));
	exit();
}

if( file_exists("./../color_select.inc") ) include("./../color_select.inc");
?>

<?php decoration_window_start('By Colin May', "100%", ""); ?>

<p class="centered"><img src="Colin1.png" width="200" height="120" align="middle"></p>
<p class="centered"><img src="Colin2.png" width="200" height="120" align="middle"></p>
<p class="centered"><img src="Colin3.png" width="200" height="120" align="middle"></p>
<p class="centered"><img src="Colin4.png" width="234" height="122" align="middle"></p>
<p class="centered"><img src="Colin5.png" width="400" height="240" align="middle"></p>
<p class="centered"><img src="Colin6.png" width="400" height="140" align="middle"></p>
<p class="centered"><img src="Colin7.png" width="300" height="180" align="middle"></p>
<p class="centered"><img src="Colin8.png" width="346" height="171" align="middle"></p>

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
