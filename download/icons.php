<?php
//--------------------------------------------------------------------
//-  File          : download/icons.php
//-  Project       : FVWM Home Page
//-  Programmer    : Uwe Pross
//-  Last modified : <06.04.2003 12:35:58 uwe>
//--------------------------------------------------------------------

if (strlen($rel_path) == 0) $rel_path = "./..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path.'/definitions.inc'); 

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
if( strlen("$navigation_check") > 0 ) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if( strlen("$site_has_been_loaded") == 0 ) {
  $site_has_been_loaded = "true";
  if( strlen($layout) > 0 ) {
    $file = $rel_path."/layout_".$layout.".inc";
    if( file_exists($file) ) $layout_file = $file;
  }
  include(sec_filename("$layout_file"));
  exit();
}
?>

  <?php decoration_window_start("Icons and sounds"); ?>
  
  The icons that used to be part of the fvwm source distribution are
  now accessible separately.
  <ul>
    <li><a href="../generated/icon_download/fvwm_icons.tgz">
	Download</a> Fvwm Icons tgz format.  This archive unpacks
      into a directory fvwm_icons.</li>
    <li><a href="../generated/icon_download/fvwm_icons.tar.bz2">
	Download</a> Fvwm Icons tar.bz2 format.</li>
    <li>View the <a href="../generated/icon_shots/side.gif">
	  side</a> pixmaps.</li>
    <li>View the <a href="../generated/icon_shots/banner.gif">
	  banner</a> pixmaps.</li>
    <li>View more <a href="../generated/icon_shots/banner2.gif">
	banner</a> pixmaps.</li>
    <li>View the <a href="../generated/icon_shots/icons.gif">
	icon</a> pixmaps.</li>
    <li>View the <a href="../generated/icon_shots/mini1.gif">
	button and mini</a> pixmaps (part 1).</li>
    <li>View the <a href="../generated/icon_shots/mini2.gif">
	button and mini</a> pixmaps (part 2).</li>
  </ul>
  Now we provide a few sounds in .au format for FvwmEvent.
  <ul>
    <li><a href="../generated/sounds_download/fvwm_sounds.tgz">
	Download</a> Fvwm Sounds tgz format.  Make a directory
      to hold the sounds, say /usr(/local/)share/sounds/fvwm, and unpack the
      "tgz" ball in this directory.</li>
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