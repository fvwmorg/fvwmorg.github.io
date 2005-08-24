<?php
//--------------------------------------------------------------------
//-  File          : index.php
//-  Project       : FVWM Home Page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

if(!isset($rel_path)) $rel_path = ".";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include_once("$rel_path/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "The Official FVWM Home Page";
$heading        = 'The Official <img src="fvwm-logo/fvwm-logo-gradient-small.png" border="0" alt="FVWM" align="middle"> Home Page';
$link_name      = "Home";
$link_picture   = "pictures/icons/home";
$parent_site    = "top";
$child_sites    = array("authors", "donations", "history", "fvwm_cats");
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "home";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
  $site_has_been_loaded = "true";
  include_once(sec_filename($theme_file));
  exit();
}
?>

<?php
decoration_window_start("Welcome to FVWM");
?>

<p>
FVWM is an extremely powerful ICCCM-compliant multiple virtual desktop
window manager for the X&nbsp; Window system.  Development is active,
and support is excellent.  Check it out!
</p>

<table border=0 cellpadding=0 cellspacing=0 summary="versions">
  <tr>
    <td class="windowcontents">Latest Stable Release: &nbsp; </td>
    <td class="windowcontents"><b><?php mylink("download", $latest_stable_release); ?> </b></td>
    <td class="windowcontents"><!-- img src="pictures/new.gif" width="28" height="12" hspace="5"--></td>
  </tr>
  <tr>
    <td class="windowcontents">Latest Unstable Release: &nbsp; </td>
    <td class="windowcontents"><b><?php mylink("download", $latest_unstable_release); ?> </b></td>
    <td class="windowcontents"><img src="pictures/new.gif" width="28" height="12" hspace="5"></td>
  </tr>
</table>
<hr>

<?php
//--------------------------------------------------------------------
// -- begin news section
//--------------------------------------------------------------------
?>
    <b>News:</b> Fvwm-2.5.14 now supports 64-bit platforms (AMD64).
<hr>
<?php
//--------------------------------------------------------------------
// -- end news section
//--------------------------------------------------------------------
?>

<div align="center">
<h2>Quick jumps</h2>

<?php
        insert_quick_jump_list(
                array(
                      "features",
                      "download",

                      "faq",
                      "windowdecors",

                      array("Bug Reporting",
                            "http://www.fvwm.org/cgi-bin/fvwm-bug",
                            "fvwm_bug_reporting"),
                      "screenshots_desks",

                      "mailing_lists",
                      "menus",

                      array("User Mailing List Archive",
                            "http://www.mail-archive.com/fvwm@fvwm.org/",
                            "fvwm_mail_archive"),
                      array("Workers Mailing List Archive",
                            "http://www.mail-archive.com/fvwm-workers@fvwm.org/",
                            "fvwm_workers_mail_archive"),

                      array("FVWM Themes",
                            "http://fvwm-themes.sf.net/",
                            "fvwm_themes"),
                      "manpages",

                      "icons",
                      "authors",

                      "links",
                      "developers",

                      "fvwm_cats",
                      "donations",

                      array("FVWM Wiki Pages",
                            "http://www.fvwmwiki.org",
                            "fvwm_wiki"),
                      array("FVWM Forum",
                            "http://fvwm.lair.be",
                            "fvwm_forum"),
                      ), 2);
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
