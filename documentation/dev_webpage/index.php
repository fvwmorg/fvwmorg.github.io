<?php
//--------------------------------------------------------------------
//-  File          : dev_webpage/index.php
//-  Project       : FVWM Home page
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

if(!isset($rel_path)) $rel_path = "./../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
if(!isset($navigation_check)) include_once($rel_path.'/definitions.inc');

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Working on fvwm website";
$heading        = "FVWM - Working on fvwm website";
$link_name      = "Web site";
$link_picture   = "pictures/icons/doc_developers_webpage";
$parent_site    = "developers";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "dev_webpage";

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

decoration_window_start("Information about the FVWM web page");

if( strlen(my_get_global("show", "GET")) == 0 ) {
    echo "<center><h1>This chapter is currently under development.</h1></center>";
    decoration_window_end();
    return;
}

?>

  <h3>General information</h3>
  <p>
    The <a href="http://www.fvwm.org">fvwm web site</a> is now based on
    <a href="http://www.php.net">php</a>. It is strongly recommended that if
    you are going to work on the fvwm site you have a access to a web server
    with php4 (or higher) to verify your changes. If you do changes on the
    web site structure (e.g. adding new files or removing files) you need a
    php version with command line interface to run <b>navgen</b>. The
    php package version 4.3.1 or higher includes a command line
    interface.
  </p>

  <h3>PHP Concept</h3>

  <h4>Introduction</h4>

  <p>
    The intentions of the concept to be introduced are to separate
    page content from page navigation and from web design.
    Further all this should be hidden from the user who shall see urls like
    <b>www.fvwm.org/news</b> rather than urls like
    <b>www.fvwm.org/theme.php?request=news</b>.
    The navigation links to navigate through the web site should
    be generated automatically from the information of all php-files
    belonging to this tree. This guarants that all links on the
    navigation aim to an existing file.
  </p>

  <h4>File hierarchie during a request</h4>

<pre class="docgraph">
Navigation Definitions -----> Base-Theme Class Description <---- Theme Options
                                          |
                                          V
                                Theme Class Description
                                          |
                                          V
                              Theme HTML/PHP Description
                                          |
                                          V
Global Definitions --------------> Function Wrapper
                                          |
                                          V
                                   Requested File
</pre>

  <h3>Adding sub sites</h3>

  <h3>HTML Coding</h3>

  <h4>Relative links</h4>

  <h3>Creating a new layout</h3>

  <h3>Generated pages</h3>
  <p>
    To keep the web page consistent with the actual fvwm version, the
    web pages about authors, news and faq are generated from the files
    AUTHORS, NEWS and doc/FAQ in the fvwm tree. In the directories 
  </p>

  

<?php decoration_window_end(); ?>
