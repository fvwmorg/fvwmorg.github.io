<?php
//--------------------------------------------------------------------
//-  File          : index.php
//-  Project       : Fvwm Home page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//-  Last modified : <30.03.2003 11:39:38 uwe>
//--------------------------------------------------------------------

if( strlen($rel_path)==0 ) $rel_path=".";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM Homepage";
$heading        = "Welcome to the Official Home Page of FVWM";
$link_name      = "FVWM&nbsp;Home";
$link_picture   = "pictures/icons/home";
$parent_site    = "top";
$child_sites    = array("fvwm_cats");
//  RBW...
//  Must be able to cope with register_globals = off.
//$requested_file = basename(my_get_global("PHP_SELF", &$_SERVER));
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));

$this_site      = "home";

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
  <?php decoration_window_start("Official Homepage of Fvwm"); ?>
  <p>
    FVWM is an extremely powerful ICCCM-compliant multiple virtual desktop
    window manager for the X&nbsp;Window system.  Development is active,
    and support is excellent.  Check it out!
  </p>
  
  <h3>NEWS FLASH!</h3>
  <p>
    as of January 2003 FVWM 2.4.15, a stable
    release, is now available for <a href="download.php">download</a>.
  </p>

  <a href="index.html">old html version</a>
  
  <hr></hr>
  <table border="0" cellpadding="0" cellspacing="0" summary="latest news">
    <tr>
      <td>Latest Stable Release: &nbsp;</td>
      <td><b>2.4.15</b></td>
    </tr>
    <tr> 
      <td>Latest Unstable Release:  &nbsp;</td>
      <td><b>2.5.6</b></td>
    </tr>
  </table>
 
  <?php
      insert_quick_jump_list(array("download",
				   "features",
				   "doc_faq",
				   "screenshots",
				   "doc_manpages",
				   "example_menus",
				   "example_vectorbuttons",
				   "example_pixmapbuttons",
				   "download_icons",
				   "contact_mailing_list",
				   "contact_mail_archive",
				   "doc_developer",
				   "doc_acknowledgements",
				   "fvwm_cats"));
   ?>
 
  <hr>
  
  <b>
    For the time of development latest changes on this web tree are 
    stated here. This part is going to be removed before the web site
    is published officially.
  </b>
  
  <pre>
<?php if(file_exists("latest_news.txt")) include "latest_news.txt";
      else
         echo "file latest_news.txt does not exist.";
  
      echo "</pre>\n";

      decoration_window_end(); 
      pop_decoration_path();
   ?>

<!--
  This is the original source. Mirrors should replace this comment.
-->

<!--  LocalWords:  FVWM
 -->
