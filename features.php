<?php
//--------------------------------------------------------------------
//-  File          : features.php
//-  Project       : FVWM Home Page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//-  Last modified : <25.03.2003 09:05:28 uwp>
//--------------------------------------------------------------------

$rel_path = ".";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Features";
$link_name      = "Features";
$link_picture   = "pictures/icons/features";
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


<?php decoration_window_start("Major FVWM Features"); ?>

<h2>Partial list of features new to 2.5.x</h2>

<ul>
  <li>Full Enhanced Window Manager Hints support</li>
  <li>Full internationalization</li>
  <li>Greately improved font support, including anti-aliasing</li>
  <li>Improved decoration code (no flickering anymore)</li>
  <li>Featuring side titles, including vertical text</li>
  <li>Powerful WindowShade in all directions, including diagonal</li>
  <li>Supporting PNG including alpha blending</li>
  <li>Image rendering in colorsets</li>
  <li>Perl library for creating modules in Perl</li>
  <li>New module FvwmPerl to enable scripting in rc files</li>
  <li>Optional text shadows (looks nice with light text)</li>
</ul>

<hr>

<h2>Partial list of features new to 2.4.x</h2>
<ul>
  <li>New dynamical colorset method for defining colors</li>
  <li>New module FvwmGtk to build GTK+ dialogs and menus</li>
  <li>Rewritten and extended functionality of FvwmButtons</li>
  <li>Several new and several removed modules</li>
  <li>Mouse strokes, draw lines to execute commands</li>
  <li>Ability to dynamically create menus</li>
  <li>Several fvwm-menu-* utiliies for creating dynamical menus</li>
  <li>Expanding useful window and desktop specific variables</li>
  <li>Featuring busy cursor in several places</li>
  <li>Full support for ICCCM2</li>
  <li>GNOME Window Manager hints support</li>
  <li>Session management support</li>
  <li>Initial internationalization support</li>
  <li>Xinerama extention support</li>
  <li>Searching files in its own user directory ~/.fvwm/</li>
</ul>

<hr>

<h2>Partial list of features new to 2.2.x</h2>
    <ul>
      <li>New more powerful and sensible rc file format</li>
      <li>Change more features on per-window basis</li>
      <li>Change many features on the fly</li>
      <li>Optional Flat or Pixmap window borders</li>
      <li>Recogizes Open Look hints</li>
      <li>Just about any focus style you can think of</li>
      <li>Unwanted features can be removed at compile time</li>
      <li>CPP preprocesing of the config file</li>
      <li>Titlebars can be suppressed, Pixmaps, gradients, or plain</li>
      <li>Titlebar buttons can be vector graphics, pixmaps or gradients</li>
      <li>Menu hot-keys, continuation menus, pixmaps in and to the side	of menus</li>
      <li>Macro definition in the config file</li>
      <li>Animated window movement</li>
      <li>A way to limit the amount of color used by fvwm (for 8 bit displays)</li>
      <li>Window manager commands can come from external programs</li>
      <li>Roll-up type window shading</li>
      <li>Some ability to centrally configure fvwm</li>
    </ul>

<hr>

<h2>Partial list of features common to 1.xx and 2.x.x</h2>
    <ul>
      <li>Multiple Disjoint Large Virtual Desktops</li>
      <li>Smaller memory usage (more so in 1.xx)</li>
      <li>Dynamically extensable via modules</li>
      <li>Recognizes Motif MWM hints</li>
      <li>Keyboard or Mouse operation</li>
      <li>Attempts to be ICCCM 2 compliant</li>
      <li>3-D look to window frames</li>
      <li>Full color shaped icons</li>
      <li>M4 preprocesing of the config file</li>
      <li>Auto-raising of windows</li>
      <li>Multi-screen support</li>
      <li>Cursor (Mouse Pointer) control on a context basis</li>
      <li>Viewport scrolling by moving the mouse off the edge of the screen</li>
      <li>Different window decorations for window that have or don't have focus</li>
      <li>Multiple ways to control icon placement</li>
      <li>Multiple ways to control initial window placement</li>
    </ul>
<?php decoration_window_end() ?>
