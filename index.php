<?php
//--------------------------------------------------------------------
//-  File          : index.php
//-  Project       : FVWM Home Page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

if (strlen($rel_path) == 0) $rel_path = ".";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include("$rel_path/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "The Official FVWM Home Page";
$heading        = 'The Official <img src="pictures/fvwm-logo-steelblue.gif" width="150" height="100" border="0" alt="FVWM" align="middle"> Home Page';
$link_name      = "Home";
$link_picture   = "pictures/icons/home";
$parent_site    = "top";
$child_sites    = array("authors", "history", "fvwm_cats");
//  RBW...
//  Must be able to cope with register_globals = off.
//$requested_file = basename(my_get_global("PHP_SELF", &$_SERVER));
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));

$this_site      = "home";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if (strlen("$navigation_check") > 0) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if (strlen("$site_has_been_loaded") == 0) {
  $site_has_been_loaded = "true";
  include(sec_filename($layout_file));
  exit();
}
?>

<?php 
decoration_window_start("Welcome to FVWM"); 
?> 

<p>
FVWM is an extremely powerful ICCCM-compliant multiple virtual desktop
window manager for the X&nbsp;Window system.  Development is active,
and support is excellent.  Check it out!
</p>

<table border=0 cellpadding=0 cellspacing=0 summary="versions">
<tr>
        <td class="windowcontents">Latest Stable Release: &nbsp; </td>
        <td class="windowcontents"><b><?php echo $latest_stable_release; ?></b></td>
</tr>
<tr>
        <td class="windowcontents">Latest Unstable Release: &nbsp; </td>
        <td class="windowcontents"><b><?php echo $latest_unstable_release; ?></b></td>
</tr>
</table>

<hr>
Participate in our new
<?php
echo '<a href="'.conv_link_target("logo-competition").'">Logo Competition</a>.';
?>
<hr>
<a href="<?php echo $rel_path;?>/birthday/index.php" class="nohilight"><img src="<?php echo $rel_path;?>/birthday/birthday_celebration1.gif" border="0" width="596" height="53"></a>
<h3>On the 1st of June 2003 we are celebrating fvwm's tenth birthday.</h3>
<hr>

<div align="center">
<h2>Quick jumps</h2>

<?php

// '
//   Features                  Download
//   FAQ                       Decors
//   Bug Reporting             Desktops
//   Mailing Lists             Menus
//   Mailing List Archive      FVWM Themes
//   Man pages                 Icons and Sounds
//   Authors                   Links
//   Developer Info            Other Important Info ^_^

        insert_quick_jump_list(
                array(
                      "features",
                      "download",

                      "faq",
                      "windowdecors",

                      array("Bug Reporting",
			    "http://www.fvwm.org/cgi-bin/fvwm-bug",
			    "fvwm_bug_reporting"),
                      "desktops",

                      "mailing_lists",
                      "menus",

                      array("Mailing List Archive",
                            "http://www.hpc.uh.edu/fvwm/archive/",
                            "mail_archive"),
                      array("FVWM Themes",
                            "http://fvwm-themes.sf.net/",
                            "fvwm_themes"),

                      "manpages",
                      "icons",

                      "authors",
                      "links",

                      "developers",
                      "fvwm_cats"), 2);
?>
</div>


<?php
decoration_window_end();
?>

<!--
  Please don't modify the rest of the page. Reserved for mirrors.
-->
<!--
  This is the original source. Mirrors should replace this comment.
-->

<!-- LocalWords: FVWM
-->
