<?php
//--------------------------------------------------------------------
//-  File          : contact/mailing_lists.php
//-  Project       : FVWM Home Page
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

if (strlen($rel_path) == 0) $rel_path = "./..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if (strlen("$navigation_check") == 0) include($rel_path.'/definitions.inc');

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Mailing Lists";
$heading        = "FVWM - Mailing Lists";
$link_name      = "Mailing Lists";
$link_picture   = "pictures/icons/contact_mailing_list";
$parent_site    = "top";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "mailing_lists";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if( strlen("$navigation_check") > 0 ) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if( strlen("$site_has_been_loaded") == 0 ) {
  $site_has_been_loaded = "true";
  include(sec_filename("$layout_file"));
  exit();
}

decoration_window_start("Mailing lists");
?>


  <p>
    PLEASE ASK QUESTIONS RELATED TO XMMS ON THE XMMS MAILING LIST.
    See <a href="http://xmms.org/">http://xmms.org/</a>.
  </p>

  <h4>The mailing list addresses are:</h4>

  <ul>
    <li><a href="mailto:fvwm@fvwm.org">fvwm@fvwm.org</a> (Discussion and questions list)</li>
    <li><a href="mailto:fvwm-announce@fvwm.org">fvwm-announce@fvwm.org</a> (Announcement only list)</li>
    <li><a href="mailto:fvwm-workers@fvwm.org">fvwm-workers@fvwm.org</a> (Beta testers and contributors list)</li>
  </ul>

  <p>
    Please help us managing incoming mail by following a few rules
    when you write to any of the fvwm related mailing list:

    <ul>
      <li> When quoting previous mails in a discussion, please put
           your replies below the quoted portions of the text.</li>
      <li> Quote all relevant parts of the original mail in a
           reply.
      <li> Type about 66 to 72 characters per line.</li>
      <li> Insert line breaks manually, even if your email program
           does it for you.</li>
      <li> Always specify the fvwm version you use when asking
           questions or reporting problems.</li>
    </ul>
  </p>

  <p>
    They are maintained by Jason Tibbitts, and are Majordomo based mailing
    lists.  To subscribe to a list, send "<code>subscribe</code>"
    in the body of a message to the appropriate <code>*-request</code>
    address.
  </p>

  <p>
    To unsubscribe from the list, send "<code>unsubscribe</code>" in the
    body of a message to the appropriate <code>*-request</code> address.
  </p>

  <h4>*-request addresses are:</h4>

  <p>
    <ul>
      <li> <a href="mailto:fvwm-request@fvwm.org">fvwm-request@fvwm.org</a></li>
      <li> <a href="mailto:fvwm-announce-request@fvwm.org">fvwm-announce-request@fvwm.org</a></li>
      <li> <a href="mailto:fvwm-workers-request@fvwm.org">fvwm-workers-request@fvwm.org</a></li>
    </ul>
  </p>

  <p>
    <strong>Subscription requests sent to the list will be ignored!</strong><br>
      Please follow the above instructions for subscribing properly.
  </p>

  <p>
    To report problems with any of the mailing lists, send mail to
    <a href="mailto:fvwm-owner@fvwm.org">fvwm-owner@fvwm.org</a>.
  </p>

  <p>
    Also the mailing lists are <a href="http://www.hpc.uh.edu/fvwm/archive/">archived</a>!
  </p>

  <p>
  <form method="GET" action="http://www.google.com/search">
  <b>Search the mail archive with Google: </b>
    <input type="text" value="" name="q" size="30">
    <input type="hidden" name="num" value="100">
    <input type="hidden" name="as_q" value="site:www.hpc.uh.edu inurl:/fvwm/archive inurl:html -inurl:index -inurl:threads">
    <input type="submit" name="btnG" value="Search Archives">
  </form>

  <h4>IRC Channels</h4>

  <p>
    Several IRC channels are also available to discuss fvwm related
    topics or to get help.  They are not official in a sense that the
    fvwm developers maintain them, but there is a chance to meet some
    of the developers there:
  </p>

  <ul>
    <li> #fvwm    on freenode</li>
    <li> +fvwm.de on IRCnet (German channel)</li>
  </ul>



<?php decoration_window_end(); ?>
