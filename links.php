<?php
//--------------------------------------------------------------------
//-  File          : links.php
//-  Project       : FVWM Home Page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//-  Last modified : <17.03.2003 19:16:12 uwe>
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


<?php decoration_window_start("Links"); ?>

<center><font size="+1">Other FVWM-related sites</font></center>
<br>
    Here are some other sites (besides the <a href="http://www.fvwm.org/">official</a> one) that have FVWM info:

    <ul>
      <li><a href="http://members.fcwm.org/glen/fvwm/">Glen Lee Edward's Screen shots and config files page</a></li>

<!--  
        RBW - Dead.  www.oneway.com/jay is still there, but no mention of
        anything to do with FVWM.
      <li><a href="http://www.oneway.com/fvwm/">Jay Kuri's Fvwm Module documentation in Palm Pilot format</a></li>
-->
      <li><a href="http://fvwm-ewmh.sourceforge.net">Extended WM Hints for fvwm 2.4</a> - Enables integration with KDE2, GTK+2 and the future GNOME2</li>

      <li><a href="http://www.igs.net/~tril/fvwm/configs/">Suzanne Skinner's
      fvwm site</a> - Stylish screenshots (and config files).<br>
      Don't miss her thoughtful and entertaining essay
      <a href="http://www.igs.net/~tril/fvwm">"My Quest For The Perfect Window Manager"</a>
      <br><i>(The hobbit in us would like to subtitle it "There and Back Again")</i>
<!--
      Question:  Does she prefer to go by Britton or Skinner?
-->
      </li>

    </ul>

    Lots of folks are into themes these days; here are a few themes-related sites:

    <ul>
      <li><a href="http://fvwm-themes.sourceforge.net/">The Official
      FVWM Themes Home Page</a> - has also links to other theme related sites.</li>

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
      <li><a href="http://www.plig.org/~xwinman/fvwm.html">Fvwm
      decorations</a> - Some screenshots and config files</li>

<!--       <li><a href="http://fvwm2gnome.fluid.cx/todo.html">fvwm2gnome</a></li> -->
<!-- 	Themes and Gnome -->
    </ul>

    And here are some sites featuring programs that are designed
    to work with or enhance FVWM:

    <ul>
      <li><a href="http://users.tpg.com.au/users/scottie7/fvwmtabs.html">FvwmTabs Module</a> - SCoTT SMeDLeY's FvwmTabs module.</li>
<!--  
        RBW - Anyone know what happened to this guy? I can't reach this host.
        Hostname resolves to 199.203.234.16, which has no reverse dns. There
        appears to be no such domain as dhs.org.
        Mikhael - was this superseded by wm-icons at sourceforge?

      <li><a href="http://wm-icons.dhs.org/">Window Manager Icons</a> - 
      an efficient icon distribution to use with fvwm and fvwm-themes.</li>
-->

      <li><a href="http://www.blackie.dk/dotfile/">The Dotfile Generator Home Page</a> - 
      A program that helps you generate .emacs, .cshrc, .fvwmrc, etc. config files</li>


      <li><a href="http://newton.physics.arizona.edu/~lapeyre/fvwmconf/index.html">John Lapeyre's FvwmConf</a> -
      A module for interactively configuring FVWM</li>

<!--
       Whatever happened to this one?  -RBW
       <li><a href="http://www-personal.umich.edu/~markcrim/tkgoodstuff/">The TkGoodStuff Home Page</a> - 
       A Tcl/Tk Program that performs like GoodStuff/FvwmButtons.</li> 
-->
    </ul>

    <hr>

<center><font size="+1">Other Window Managers</font></center>
<br>
    Here are some window managers that were originally created from fvwm
    source, but 
    <strong>please don't ask questions about them on the FVWM lists! </strong>
    Rather, contact the parties responsible for them directly:

    <ul>
<!-- 
        RBW - this link's dead too, but I know SCWM still has to be around.
        Gotta do some googling and find a current url.
        Hmm...doesn't seem to have been updated in about 2 years (March 2000).
        Guess they're not active.

     <li><a href="http://vicarious-existence.mit.edu/scwm/">SCWM</a> - The
	Scheme Configurable Window Manager</li>
-->

      <li><a href="http://scwm.sourceforge.net/">SCWM</a> - The
	Scheme Configurable Window Manager</li>

      <li><a href="http://www.afterstep.org/">AfterStep</a> - A window manager
      that emulates the famous NEXTSTEP<sup>&reg;</sup> look and feel, AfterStep
      took up where Bo Yang's Bowman (no longer available) left off.</li>

<!--       <li><a href="ftp://mitac11.uia.ac.be/html-test/fvwm95.html">Fvwm95</a> - A hack of an fvwm2 beta that looks more like (shudder) Win95</li> -->
    </ul>

<!--
    And here's an excellent site with all sorts of window manager
    information and comparisons (new location):
-->
    Matt Chapman's excellent survey of window managers present and past
    (from the famous to the downright obscure)
    should be required reading for anyone choosing a window manager
    (or trying to write one).

    <ul>
      <li><a href="http://www.PLiG.org/xwinman/">Window Managers for X</a><br>
      <i>Be sure to vote for FVWM in the voting section!</i> :)</li>
      <br><i><b>Developers' note:</b> Should we email Matt re: the "Comparisons" section
      that FVWM now effectively has "pinnable menus", as he defines the term?</i>
    </ul>

    

    <hr>
    <center><font size="+1">General Resources</font></center>
    <br>

      Don't forget about Newsgroups:

    <ul>
      <li><a href="news:comp.windows.x.apps">comp.windows.x.apps</a>
      - for discussing and announcing apps like FVWM.
      (Questions about about are best asked by sending mail to
      <a href="mailto:fvwm@fvwm.org">fvwm@fvwm.org</a>.)</li>

      <li><a href="news:comp.windows.x">comp.windows.x</a>
      - for general X11 discussions and advice.</li>
    </ul>

    <p></p>

<!--
      And how about an online version of the ICCCM:
-->
      Finally, if you want to know why FVWM does some of the things it does
      (or if you just want to see if we're really behaving properly!),
      you can peruse the online version of the ICCCM:

    <ul>
      <li><A HREF="http://tronche.com/gui/x/icccm/">Inter-Client Communication Conventions Manual</A></li>
    </ul>

    <hr>


<?php decoration_window_end() ?>
