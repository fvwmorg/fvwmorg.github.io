<?php
//--------------------------------------------------------------------
//-  File          : donations.php
//-  Project       : FVWM Home page
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

if(!isset($rel_path)) $rel_path = ".";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if(!isset($navigation_check)) include_once($rel_path.'/definitions.inc');

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Donations & Hiring";
$link_name      = "Donations";
$link_picture   = "pictures/icons/donations";
$parent_site    = "home";
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
  include_once(sec_filename("$layout_file"));
  exit();
}

decoration_window_start("Donations & Hiring");
?>


<p>
Fvwm is being developed by a number of long term users on a
volunteer basis.  We spend some of our free time on fvwm,
depending on other factors.  Normally, we do not need donations to
keep us working on fvwm, but we can usually not make any
guarantees when - or even if - things get done.
</p>

<?php /*
<p>
Personally, I (Dominik) partially earn my living as a
freelance programmer.  To help the fvwm cause, you can make a
donation to me or hire me to implement a specific feature.
Donations not dedicated to a specific task will be spent to pay my
bills while I work on the most pressing items on the list below.
Also, I will work an additional day on my spare time for every 4
days funded.  If you are interested in sponsoring fvwm, send mail
to <a href="mailto:dominik(dot)vogt(at)gmx(dot)de">dominik(dot)vogt(at)gmx(dot)de</a> or
contact the <a
href="mailto:fvwm-workers@fvwm.org">fvwm-workers@fvwm.org</a>
mailing list.  Any sponsors will be mentioned on this page.
</p>

  <h3>Currently, donations are welcome to </h3>
  <ul>
    <li> Help to get fvwm-2.6 released (about 1 person month of work)</li>
  </ul>

<h2>Donators</h2>
*/ ?>

<?php decoration_window_end(); ?>
