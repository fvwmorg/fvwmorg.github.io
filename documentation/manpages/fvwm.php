<?php
//--------------------------------------------------------------------
//-  File          : documentation/manpages/manpage_template.php_
//-  Project       : FVWM Home Page
//-  Programmer    : Uwe Pross
//-  Last modified : <10.04.2003 08:47:10 uwp>
//--------------------------------------------------------------------

// this is a template file for a manpage file
// Please use the script in this directory to generate the php files
// from the fvwm manpages

//--------------------------------------------------------------------
// this manpages should not apear in the navigation structure
// so we hide its contents from navgen
//--------------------------------------------------------------------
if( strlen("$navigation_check") > 0 ) return;


if (strlen($rel_path) == 0) $rel_path = "../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Man page @MAN_NAME@";            
$heading        = "FVWM - Man page @MAN_NAME@";            
$link_name      = "Man page";                   
$link_picture   = "pictures/icons/doc_manpages";
$parent_site    = "documentation";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));

// Since manpages shall not apear in the navigation structure this 
// page must identify itself with another name. It says here that 
// it's name is manpages which belongs actually to the table of 
// content page for all man pages. The layout file will therefore 
// mark the navigation entry for the toc file as choosen althougth 
// it is actually not choosen.
$this_site      = "manpages";

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

<?php decoration_window_start("@MAN_NAME@"); ?>  

<!-- maybe a link to the table of contents for fvwm manual pages is insert here -->
<a href="index.php">Back to fvwm man pages</a>

<p>fvwm - F(?) Virtual Window Manager (version 2) for X11
   <a name="lbAC">&nbsp;</a></p>
<h2>SYNOPSIS</h2>
<p><b>fvwm</b> [<b>-blackout</b>] [<b>-clientId</b> <i>id</i>]
[<b>-cmd</b> <i>config_command</i>] [<b>-d</b> <i>displayname</i>]
[<b>-debug</b>] [<b>-debug_stack_ring</b>] [<b>-f</b>
<i>config_file</i>] [<b>-h</b>] [<b>-replace</b>] [<b>-restore</b>
<i>state_file</i>] [<b>-s</b>] [<b>-version</b>] [<b>-visual</b>
<i>visual_class</i>] [<b>-visualId</b> <i>id</i>]</p>
<p><a name="lbAD">&nbsp;</a></p>
<h2>DESCRIPTION</h2>
<p>Fvwm is a window manager for X11. It is designed to minimize
memory consumption, provide a 3D look to window frames, and a
virtual desktop.</p>
<p>Note that there are several window managers around that have
"fvwm" in their name. In the past, version 2.x of fvwm was commonly
called fvwm2 to distinguish it from the former version 1.x (fvwm or
even fvwm1). Since version 1.x has been replaced by version 2.x a
long time ago we simply call version 2.x and all versions to come,
fvwm, throughout this document, and the executable program is named
fvwm. There is an fvwm offspring called fvwm95. Although it is very
similar to older versions of fvwm version 2 it is technically a
different window manager that has been developed by different
people. The main goal of fvwm95 was to supply a Windows 95 like
look and feel. Since then fvwm has been greatly enhanced and only
very few features of fvwm95 can not be imitated by fvwm. No active
development has been going on for fvwm95 for several years now.
Unfortunately Red Hat (a popular Linux distributor) has a
pre-configured fvwm package based on fvwm version 2.x that is
called fvwm95 too.</p>
<p>Fvwm provides both a large <i>virtual desktop</i> and
<i>multiple disjoint desktops</i> which can be used separately or
together. The virtual desktop allows you to pretend that your video
screen is really quite large, and you can scroll around within the
desktop. The multiple disjoint desktops allow you to pretend that
you really have several screens to work at, but each screen is
completely unrelated to the others.</p>
<p>Fvwm provides <i>keyboard accelerators</i> which allow you to
perform most window-manager functions, including moving and
resizing windows, and operating the menus, using keyboard
shortcuts.</p>
<p>Fvwm has also blurred the distinction between configuration
commands and built-in commands that most window-managers make.
Configuration commands typically set fonts, colors, menu contents,
key and mouse function bindings, while built-in commands typically
do things like raise and lower windows. Fvwm makes no such
distinction, and allows, to the extent that is practical, anything
to be changed at any time.</p>
<p>Other noteworthy differences between Fvwm and other X11 window
managers are the introduction of the <i>SloppyFocus</i> and
<i>NeverFocus</i> focus methods. Focus policy can be specified for
individual windows. Windows using <i>SloppyFocus</i> acquire focus
when the pointer moves into them and retain focus until some other
window acquires it. Such windows do not lose focus when the pointer
moves into the root window. The <i>NeverFocus</i> policy is
provided for use with windows into which one never types (e.g.
xclock, oclock, xbiff, xeyes, tuxeyes) - for example, if a
SloppyFocus terminal window has focus, moving the cursor over a
<i>NeverFocus</i> decoration window won't deprive the terminal of
focus.</p>
<p><a name="lbAE">&nbsp;</a></p>
<h2>OPTIONS</h2>

-- stop here to keep the file small --

<hr>
<a name="index">&nbsp;</a>
<h2>Index</h2>
<dl>
<dt><a href="#lbAB">NAME</a></dt>
<dt><a href="#lbAC">SYNOPSIS</a></dt>
<dt><a href="#lbAD">DESCRIPTION</a></dt>
<dt><a href="#lbAE">OPTIONS</a></dt>
<dt><a href="#lbAF">ANATOMY OF A WINDOW</a></dt>
<dt><a href="#lbAG">THE VIRTUAL DESKTOP</a></dt>
<dt><a href="#lbAH">USE ON MULTI-SCREEN DISPLAYS</a></dt>
<dt><a href="#lbAI">XINERAMA SUPPORT</a></dt>
<dt><a href="#lbAJ">INITIALIZATION</a></dt>
<dt><a href="#lbAK">COMPILATION OPTIONS</a></dt>
<dt><a href="#lbAL">ICONS AND IMAGES</a></dt>
<dt><a href="#lbAM">MODULES</a></dt>
<dt><a href="#lbAN">ICCCM COMPLIANCE</a></dt>
<dt><a href="#lbAO">GNOME COMPLIANCE</a></dt>
<dt><a href="#lbAP">EXTENDED WINDOW MANAGER HINTS</a></dt>
<dt><a href="#lbAQ">MWM COMPATIBILITY</a></dt>
<dt><a href="#lbAR">OPEN LOOK and XVIEW COMPATIBILITY</a></dt>
<dt><a href="#lbAS">M4 PREPROCESSING</a></dt>
<dt><a href="#lbAT">CPP PREPROCESSING</a></dt>
<dt><a href="#lbAU">AUTO-RAISE</a></dt>
<dt><a href="#lbAV">CONFIGURATION FILES</a></dt>
<dt><a href="#lbAW">SUPPLIED CONFIGURATION</a></dt>
<dt><a href="#lbAX">FONT NAMES AND FONT LOADING</a></dt>
<dt><a href="#lbAY">FONT AND STRING ENCODING</a></dt>
<dt><a href="#lbAZ">FONT SHADOW EFFECTS</a></dt>
<dt><a href="#lbBA">BI-DIRECTIONAL TEXT</a></dt>
<dt><a href="#lbBB">KEYBOARD SHORTCUTS</a></dt>
<dt><a href="#lbBC">SESSION MANAGEMENT</a></dt>
<dt><a href="#lbBD">BOOLEAN ARGUMENTS</a></dt>
<dt><a href="#lbBE">CONDITIONAL COMMANDS AND RETURN CODES</a></dt>
<dt><a href="#lbBF">BUILT IN KEY AND MOUSE BINDINGS</a></dt>
<dt><a href="#lbBG">BUILT IN COMMANDS</a></dt>
<dd>
<dl>
<dt><a href="#lbBH">QUOTING</a></dt>
<dt><a href="#lbBI">COMMAND EXPANSION</a></dt>
<dt><a href="#lbBJ">THE LIST OF BUILTIN COMMANDS</a></dt>
<dt><a href="#lbBK">COMMANDS FOR MENUS</a></dt>
<dt><a href="#lbBL">MISCELLANEOUS COMMANDS</a></dt>
<dt><a href="#lbBM">COMMANDS AFFECTING WINDOW MOVEMENT AND
PLACEMENT</a></dt>
<dt><a href="#lbBN">COMMANDS FOR FOCUS AND MOUSE MOVEMENT</a></dt>
<dt><a href="#lbBO">COMMANDS CONTROLLING WINDOW STATE</a></dt>
<dt><a href="#lbBP">COMMANDS FOR MOUSE, KEY AND STROKE
BINDINGS</a></dt>
<dt><a href="#lbBQ">THE STYLE COMMAND (CONTROLLING WINDOW
STYLES)</a></dt>
<dt><a href="#lbBR">OTHER COMMANDS CONTROLLING WINDOW
STYLES</a></dt>
<dt><a href="#lbBS">COMMANDS CONTROLLING THE VIRTUAL
DESKTOP</a></dt>
<dt><a href="#lbBT">COMMANDS FOR USER FUNCTIONS AND SHELL
COMMANDS</a></dt>
<dt><a href="#lbBU">CONDITIONAL COMMANDS</a></dt>
<dt><a href="#lbBV">MODULE COMMANDS</a></dt>
<dt><a href="#lbBW">QUIT, RESTART AND SESSION MANAGEMENT
COMMANDS</a></dt>
<dt><a href="#lbBX">COLORSETS</a></dt>
<dt><a href="#lbBY">COLOR GRADIENTS</a></dt></dl></dd>
<dt><a href="#lbBZ">ENVIRONMENT</a></dt>
<dt><a href="#lbCA">AUTHORS</a></dt>
<dt><a href="#lbCB">COPYRIGHT</a></dt>
<dt><a href="#lbCC">BUGS</a></dt></dl>


<?php decoration_window_end(); ?>