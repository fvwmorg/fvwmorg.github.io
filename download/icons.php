<?php
//--------------------------------------------------------------------
//-  File          : download/icons.php
//-  Project       : FVWM Home Page
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

if(!isset($rel_path)) $rel_path = "./..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if(!isset($navigation_check)) include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Download Icons and Sounds";
$heading        = "FVWM Icons and Sounds";
$link_name      = "Icons and Sounds";
$link_picture   = "pictures/icons/download_icons";
$parent_site    = "download";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = str_replace(".php", "", "$requested_file");

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
  $site_has_been_loaded = "true";
  include(sec_filename("$layout_file"));
  exit();
}
?>

  <?php decoration_window_start("Icons and sounds"); ?>
  
  The icons that used to be part of the fvwm source distribution are
  now accessible separately.
  <ul>
    <li><a href="../generated/icon_download/fvwm_icons.tgz">
	Download</a> gzip'ed tarball with traditional old icons.
        This archive unpacks into a directory fvwm_icons.</li>
    <li><a href="../generated/icon_download/fvwm_icons.tar.bz2">
	Download</a> the same icons in bzip2 tarball.</li>
    <li>View the <a href="../generated/icon_shots/side.gif">
	  side</a> pixmaps.</li>
    <li>View the <a href="../generated/icon_shots/banner.gif">
	  banner</a> pixmaps.</li>
    <li>View more <a href="../generated/icon_shots/banner2.gif">
	banner</a> pixmaps.</li>
    <li>View the <a href="../generated/icon_shots/icons.gif">
	icon</a> pixmaps.</li>
    <li>View the button and mini pixmaps 
	<a href="../generated/icon_shots/mini1.gif">(part 1, gif)</a>,
	<a href="../generated/icon_shots/mini2.gif">(part 2, gif)</a>,
	<a href="<?php echo conv_link_target('mini_icons_overview.php');?>">(all, png)</a>
      </li>
  </ul>
  Now we provide a few sounds in .au format for FvwmEvent.
  <ul>
    <li><a href="../generated/sounds_download/fvwm_sounds.tgz">
	Download</a> tarball with some sound files.  Make a directory
        to hold the sounds, say /usr(/local/)share/sounds/fvwm,
        and unpack the "tgz" ball in this directory.</li>
    <li>  <a href="../sounds/clong.au">
	clong.au</a> can be used for (de)iconify events.</li>
    <li><a href="../sounds/gong.au">
	gong.au</a> can be used at FvwmEvent startup.</li>
    <li><a href="../sounds/pook.au">
	pook.au</a> can be used for destroy_window events.</li>
    <li><a href="../sounds/slide.au">
	slide.au</a> can be used for (de)windowshade, new_page, new_desk
      events.</li>
    <li><a href="../sounds/wipe.au">
	wipe.au</a> can be used for add_window events.</li>
  </ul>

  <?php decoration_window_end(); ?>
