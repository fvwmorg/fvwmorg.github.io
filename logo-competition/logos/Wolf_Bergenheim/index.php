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
$title          = "FVWM - Logo Competition - Wolf Bergenheim logos";
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

<?php decoration_window_start('By Wolf Bergenheim', "100%", ""); ?>
  <!--
  From: Wolf Bergenheim <wolf@bergenheim.net>
  Date: Tue, 1 Jul 2003 00:44:22 +0300 (EEST)
  -->
  <p>
    I see FVWM as  very modular, and therefore flexible and powerfull. In my 
    logo I visualize that by using the Tangram pieces. There are only 7 (8 if
    you count the rhomb as two ;) pieces, but with these pieces you can form
    over 6000 different figures. Same with FVWM using the modules, and using
    them differently you can get an almost unlimited amount of different
    configurations. This is what I try to tell in my logo; by using the 
    same 7 Tangram pieces I am able to form the 4 different letters F V W M.
  </p>
  <p>
    I made the outlines with DIA and then exported to PNG, and finished with 
    GIMP. The forms are geometric so resizing is not a problem (as you can see
    I have provided the logos in 3 different sizes. Also the background is  
    transparent, so the logo should look good on any background. I have also
    included the logo in light-gray, for use on a dark background. I can
    provide any color you want :)
  </p>

  <p class="centered">
    <img src="tangram_FVWM_logo_menu.png" width="24" height="110" border="0" hspace="2" vspace="2" alt="logo"> 
    <img src="tangram_FVWM_logo_banner.png" width="651" height="161" border="0" hspace="2" vspace="2" alt="logo"><br>
    <img src="tangram_FVWM_logo_menu_rev.png" width="24" height="110" border="0" hspace="2" vspace="2" alt="logo">
    <img src="tangram_FVWM_logo_banner_rev.png" width="651" height="161" border="0" hspace="2" vspace="2" alt="logo"><br>
    <img src="tangram_FVWM_logo_website.png" width="485" height="120" border="0" hspace="2" vspace="2" alt="logo"><br>
    <img src="tangram_FVWM_logo_website_rev.png" width="485" height="120" border="0" hspace="2" vspace="2" alt="logo"><br>
    <img src="tangram_FVWM_logo_banner_white.png" width="651" height="161" border="0" hspace="2" vspace="2" alt="logo">
  </p>

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>
