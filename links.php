<?php
//--------------------------------------------------------------------
//-  File          : links.php
//-  Project       : FVWM Home Page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

$rel_path = ".";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Links";
$link_name      = "Links";
$link_picture   = "pictures/icons/links";
$parent_site    = "top";
$child_sites    = array("customize_theme");
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
  include(sec_filename("$layout_file"));
  exit();
}
?>


<?php decoration_window_start("Links"); ?>

  <h2>Other FVWM-related sites</h2>

  <p>
    Here are some other sites (besides the 
    <a href="http://www.fvwm.org/">official</a> one) that have FVWM info:
  </p>


  <h2>Window Decors and Other Configuration Tips</h2>

    <ul>
      <li><a href="http://members.fcwm.org/glen/fvwm/">Glen Lee Edward's Screen
        shots and config files page</a> ("FVWM - Do it your way!") - 
        illustrates FVWM's flexibility with configuration information and, of course,
        the obligatory screenshots.</li>

<!--  
        RBW - Dead.  www.oneway.com/jay is still there, but no mention of
        anything to do with FVWM.
      <li><a href="http://www.oneway.com/fvwm/">
      Jay Kuri's Fvwm Module documentation in Palm Pilot format</a></li>
-->

      <li><a href="http://www.igs.net/~tril/fvwm/configs/">Suzanne Skinner's
      FVWM site</a> - Stylish screenshots (and config files) from the author
      of the MultiPixmap titlebar feature.
      Don't miss her thoughtful and entertaining essay
      <a href="http://www.igs.net/~tril/fvwm">"My Quest For The Perfect Window Manager".</a>
      <i>(The hobbit in us would like to subtitle it "There and Back Again".)</i>
      </li>

      <li><a href="http://www.twobarleycorns.net/fvwm-decors.html">Dorothy Robinson's
        FVWM 2.6 Decors</a> - an impressive collection of window decors showing off
        FVWM 2.6's visual versatility. All the config files are downloadable. There is
        also a collection of <a href="http://www.twobarleycorns.net/fvwm24-decors.html">
        decors that can be used with 2.4</a>.
      </li>

    </ul>


  <h2>Themes</h2>

  <p>You say you're into desktop themes? Then one of these sites should be your
  next stop:</p>

    <ul>
      <li><a href="http://fvwm-themes.sourceforge.net/">The Official
      FVWM Themes Home Page</a> - highly recommended for novice users. FVWM Themes
      provides a powerful gui-driven theme engine and a wide variety of preconfigured
      themes so you can get started without having to learn anything about FVWM
      configuration commands. If the supplied themes don't suit you, you can create
      your own, or mix and match components from the existing ones.<br>
      The site also has links to other theme related sites.</li>

      <li><a href="http://wm-icons.sourceforge.net/">The Window Manager Icons Project</a> - 
      an efficient icon distribution to use with fvwm and fvwm-themes.</li>

<!--
        RBW - does anyone have an updated link? Can't locate this server.
        It's dead, Jim.
        A search of Colorado State's Web site doesn't turn up a Scott Scriven.
        Last known address is Anchorage, AK.  
        forum.beringsea.com/users/scott    toykeeper.com

      <li><a href="http://www.vis.colostate.edu/~scriven/fvwm.php3">Scott
      Scriven's theme page</a>.</li>
-->
      <li><a href="http://www.plig.org/~xwinman/fvwm.html">FVWM
      Decorations</a> - Some screenshots and config files</li>

    </ul>


  <h2>Add-ons</h2>

    <p>And here are some sites featuring programs that are designed
    to work with or enhance FVWM:</p>

    <ul>

      <li><a href="http://fvwm-ewmh.sourceforge.net">Extended WM Hints for fvwm 2.4</a> - 
        Enables integration with KDE2, GTK+2 and the future GNOME2 (this support has
        been integrated by the author into the FVWM 2.6 core)</li>

      <li><a href="http://users.tpg.com.au/users/scottie7/fvwmtabs.html">FvwmTabs Module</a> - 
        SCoTT SMeDLeY's FvwmTabs module.</li>

      <li><a href="http://www.blackie.dk/dotfile/">The Dotfile Generator Home Page</a> - 
      A program that helps you generate .emacs, .cshrc, .fvwmrc, etc. config files (pretty old)</li>

      <li><a href="http://newton.physics.arizona.edu/~lapeyre/fvwmconf/index.html">John Lapeyre's FvwmConf</a> -
      A module for interactively configuring FVWM (old, 1997)</li>

<!--
       Whatever happened to this one?  -RBW
       <li><a href="http://www-personal.umich.edu/~markcrim/tkgoodstuff/">
       The TkGoodStuff Home Page</a> - 
       A Tcl/Tk Program that performs like GoodStuff/FvwmButtons.</li> 
-->
    </ul>


  <h2>Other Window Managers</h2>

  <p>  
    Here are some window managers that were originally created from fvwm
    source, but 
    <strong>please don't ask questions about them on the FVWM lists!</strong>
    Rather, contact the parties responsible for them directly:</p>

    <ul>
<!-- 
        RBW - doesn't seem to have been updated in about 2 years (March 2000).
        Guess they're not active. Seems to be just archived at sourceforge,
        like fvwm95.
-->
      <li><a href="http://scwm.sourceforge.net/">SCWM</a>
        - The Scheme Configurable Window Manager</li>

      <li><a href="http://www.afterstep.org/">AfterStep</a>
        - A window manager that emulates the famous NEXTSTEP<sup>&reg;</sup>
        look and feel, AfterStep took up where Bo Yang's Bowman (no longer
        available) left off.</li>

      <li><a href="http://fvwm95.sourceforge.net/">FVWM-95</a>
        - An old hack of fvwm-2.0.42 that looks more like (shudder) Win95.</li>

      <li><a href="http://lesstif.org/">Lesstif's MWM</a>
        - Intended to simulate a Motif-like window manager.
        Abandoned in 1997.</li>

      <li><a href="http://xfce.org/">XFwm</a>
        - A part of the XFce desktop enviroment.</li>
    </ul>

  <p>
    Matt Chapman's excellent survey of window managers present and past
    (from the famous to the downright obscure)
    should be required reading for anyone choosing a window manager
    (or trying to write one).
  </p>

    <ul>
      <li><a href="http://www.PLiG.org/xwinman/">Window Managers for X</a><br>
    </ul>
  
  <h2>General Resources</h2>

  <p>Don't forget about Newsgroups:</p>

  <ul>
    <li><a href="news:comp.windows.x.apps">comp.windows.x.apps</a>
      - for discussing and announcing apps like FVWM.
      (Questions about about are best asked by sending mail to
      <a href="mailto:fvwm@fvwm.org">fvwm@fvwm.org</a>.)</li>
    
    <li><a href="news:comp.windows.x">comp.windows.x</a>
      - for general X11 discussions and advice.</li>
  </ul>
  
  <!--
  And how about an online version of the ICCCM:
  -->
  <p>
    Finally, if you want to know why FVWM does some of the things it does
    (or if you just want to see if we're really behaving properly!),
    you can peruse the online version of the ICCCM:
  </p>

    <ul>
      <li><A HREF="http://tronche.com/gui/x/icccm/">Inter-Client Communication Conventions Manual</A></li>
    </ul>


<?php decoration_window_end() ?>
