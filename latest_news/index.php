<?php
//--------------------------------------------------------------------
//-  File          : news_template.php_
//-  Project       : FVWM Home Page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

$rel_path = "..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - NEWS";
$link_name      = "News";
$link_picture   = "pictures/icons/news";
$parent_site    = "top";
$child_sites    = array("logo_competition");
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "news";

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

decoration_window_start("Latest News");

?>

<h4>Selection by release:</h4>
<center>
<table border="0" width="90%" cellspacing="3" summary="">
<tr>
<td><a href="#2.5.6" style="font-weight:normal;">&nbsp;2.5.6&nbsp;</a></td>
<td><a href="#2.5.5" style="font-weight:normal;">&nbsp;2.5.5&nbsp;</a></td>
<td><a href="#2.5.4" style="font-weight:normal;">&nbsp;2.5.4&nbsp;</a></td>
<td><a href="#2.5.3" style="font-weight:normal;">&nbsp;2.5.3&nbsp;</a></td>
<td><a href="#2.5.2" style="font-weight:normal;">&nbsp;2.5.2&nbsp;</a></td>
<td><a href="#2.5.1" style="font-weight:normal;">&nbsp;2.5.1&nbsp;</a></td>
<td><a href="#2.5.0" style="font-weight:normal;">&nbsp;2.5.0&nbsp;</a></td>
<td><a href="#2.4.15" style="font-weight:normal;">&nbsp;2.4.15&nbsp;</a></td>
<td><a href="#2.4.14" style="font-weight:normal;">&nbsp;2.4.14&nbsp;</a></td>
<td><a href="#2.4.13" style="font-weight:normal;">&nbsp;2.4.13&nbsp;</a></td>
<td><a href="#2.4.12" style="font-weight:normal;">&nbsp;2.4.12&nbsp;</a></td>
<td><a href="#2.4.11" style="font-weight:normal;">&nbsp;2.4.11&nbsp;</a></td>
<td><a href="#2.4.10" style="font-weight:normal;">&nbsp;2.4.10&nbsp;</a></td>
</tr>
<tr>
<td><a href="#2.4.9" style="font-weight:normal;">&nbsp;2.4.9&nbsp;</a></td>
<td><a href="#2.4.8" style="font-weight:normal;">&nbsp;2.4.8&nbsp;</a></td>
<td><a href="#2.4.7" style="font-weight:normal;">&nbsp;2.4.7&nbsp;</a></td>
<td><a href="#2.4.6" style="font-weight:normal;">&nbsp;2.4.6&nbsp;</a></td>
<td><a href="#2.4.5" style="font-weight:normal;">&nbsp;2.4.5&nbsp;</a></td>
<td><a href="#2.4.4" style="font-weight:normal;">&nbsp;2.4.4&nbsp;</a></td>
<td><a href="#2.4.3" style="font-weight:normal;">&nbsp;2.4.3&nbsp;</a></td>
<td><a href="#2.4.2" style="font-weight:normal;">&nbsp;2.4.2&nbsp;</a></td>
<td><a href="#2.4.1" style="font-weight:normal;">&nbsp;2.4.1&nbsp;</a></td>
<td><a href="#2.4.0" style="font-weight:normal;">&nbsp;2.4.0&nbsp;</a></td>
<td><a href="#2.3.33" style="font-weight:normal;">&nbsp;2.3.33&nbsp;</a></td>
<td><a href="#2.3.32" style="font-weight:normal;">&nbsp;2.3.32&nbsp;</a></td>
<td><a href="#2.3.31" style="font-weight:normal;">&nbsp;2.3.31&nbsp;</a></td>
</tr>
<tr>
<td><a href="#2.3.30" style="font-weight:normal;">&nbsp;2.3.30&nbsp;</a></td>
<td><a href="#2.3.29" style="font-weight:normal;">&nbsp;2.3.29&nbsp;</a></td>
<td><a href="#2.3.28" style="font-weight:normal;">&nbsp;2.3.28&nbsp;</a></td>
<td><a href="#2.3.27" style="font-weight:normal;">&nbsp;2.3.27&nbsp;</a></td>
<td><a href="#2.3.26" style="font-weight:normal;">&nbsp;2.3.26&nbsp;</a></td>
<td><a href="#2.3.25" style="font-weight:normal;">&nbsp;2.3.25&nbsp;</a></td>
<td><a href="#2.3.24" style="font-weight:normal;">&nbsp;2.3.24&nbsp;</a></td>
<td><a href="#2.3.23" style="font-weight:normal;">&nbsp;2.3.23&nbsp;</a></td>
<td><a href="#2.3.22" style="font-weight:normal;">&nbsp;2.3.22&nbsp;</a></td>
<td><a href="#2.3.21" style="font-weight:normal;">&nbsp;2.3.21&nbsp;</a></td>
<td><a href="#2.3.20" style="font-weight:normal;">&nbsp;2.3.20&nbsp;</a></td>
<td><a href="#2.3.19" style="font-weight:normal;">&nbsp;2.3.19&nbsp;</a></td>
<td><a href="#2.3.18" style="font-weight:normal;">&nbsp;2.3.18&nbsp;</a></td>
</tr>
<tr>
<td><a href="#2.3.17" style="font-weight:normal;">&nbsp;2.3.17&nbsp;</a></td>
<td><a href="#2.3.16" style="font-weight:normal;">&nbsp;2.3.16&nbsp;</a></td>
<td><a href="#2.3.15" style="font-weight:normal;">&nbsp;2.3.15&nbsp;</a></td>
<td><a href="#2.3.14" style="font-weight:normal;">&nbsp;2.3.14&nbsp;</a></td>
<td><a href="#2.3.13" style="font-weight:normal;">&nbsp;2.3.13&nbsp;</a></td>
<td><a href="#2.3.12" style="font-weight:normal;">&nbsp;2.3.12&nbsp;</a></td>
<td><a href="#2.3.11" style="font-weight:normal;">&nbsp;2.3.11&nbsp;</a></td>
<td><a href="#2.3.10" style="font-weight:normal;">&nbsp;2.3.10&nbsp;</a></td>
<td><a href="#2.3.9" style="font-weight:normal;">&nbsp;2.3.9&nbsp;</a></td>
<td><a href="#2.3.8" style="font-weight:normal;">&nbsp;2.3.8&nbsp;</a></td>
<td><a href="#2.3.7" style="font-weight:normal;">&nbsp;2.3.7&nbsp;</a></td>
<td><a href="#2.3.6" style="font-weight:normal;">&nbsp;2.3.6&nbsp;</a></td>
<td><a href="#2.3.5" style="font-weight:normal;">&nbsp;2.3.5&nbsp;</a></td>
</tr>
<tr>
<td><a href="#2.3.4" style="font-weight:normal;">&nbsp;2.3.4&nbsp;</a></td>
<td><a href="#2.3.3" style="font-weight:normal;">&nbsp;2.3.3&nbsp;</a></td>
<td><a href="#2.3.2" style="font-weight:normal;">&nbsp;2.3.2&nbsp;</a></td>
<td><a href="#2.3.1" style="font-weight:normal;">&nbsp;2.3.1&nbsp;</a></td>
<td><a href="#2.3.0" style="font-weight:normal;">&nbsp;2.3.0&nbsp;</a></td>
<td><a href="#2.2.5" style="font-weight:normal;">&nbsp;2.2.5&nbsp;</a></td>
<td><a href="#2.2.4" style="font-weight:normal;">&nbsp;2.2.4&nbsp;</a></td>
<td><a href="#2.2.3" style="font-weight:normal;">&nbsp;2.2.3&nbsp;</a></td>
<td><a href="#2.2.2" style="font-weight:normal;">&nbsp;2.2.2&nbsp;</a></td>
<td><a href="#2.2.2" style="font-weight:normal;">&nbsp;2.2.2&nbsp;</a></td>
<td><a href="#" style="font-weight:normal;">&nbsp;&nbsp;</a></td>
</tr>
</table>
</center>
<a name="2.5.7"></a>
<h4>Changes in development release 2.5.7 (not released yet) <a href="#top">[top]</a></h4>
<ul>
  <li> In FvwmIconMan, windows can move from one manager to another  acoording to the managers' Resolution options.</li>
  <li> In order to fix a problem with StartsOnScreen and applications  that set a user specified position hint, the StartsOnScreen style  no longer works for the following modules:  FvwmBanner,  FvwmButtons, FvwmDragWell, FvwmIconBox, FvwmIconMan, FvwmIdent,  FvwmPager, FvwmScroll, FvwmTaskBar, FvwmWharf, FvwmWinList.  Use  the '@&lt;screen&gt;' bit in the module geometry specification where  applicable.</li>
</ul>


<a name="2.5.6"></a>
<h4>Changes in development release 2.5.6 (28-Feb-2003) <a href="#top">[top]</a></h4>
<ul>
  <li> Fix button 3 drag in FvwmPager so that drag follows the mouse.</li>
  <li> Fix for gmplayer launched by fvwm. Close stdin on Exec so the  exec'd process knows its not running interactively.</li>
  <li> Improvement in MultiPixmap. In particular Colorset and Solid  color can be specified.</li>
  <li> New ButtonStyle and TitleStyle style options AdjustedPixmap,  StretchedPixmap and ShrunkPixmap.</li>
  <li> Use the MIT Shared Memory Extension for XImage.</li>
  <li> The TitleStyle decor of a vertical window Title is rotated.  This is controllable using a new style option:    !UseTitleDecorRotation / UseTitleDecorRotation</li>
  <li> New style options IconBackgroundColorset, IconTitleColorset,  HilightIconTitleColorset, IconTitleRelief, IconBackgroundRelief  and IconBackgroundPadding.</li>
  <li> Minor incompatible improvements to the Perl library API.</li>
  <li> Renamed FvwmWindowLister to FvwmWindowMenu.</li>
  <li> New option to IconSize style: Adjusted, Stretched, Shrunk.</li>
  <li> New shortcuts for button states: AllActiveUp, AllActiveDown,  AllInactiveUp, AllInactiveDown.</li>
  <li> New Style options:    Closable, Iconifiable, Maximizable, AllowMaximizeFixedSize</li>
  <li> New conditions for matching windows:    Closable, Iconifiable, Maximizable, FixedSize and HasHandles</li>
  <li> New conditional command On for non-window related conditions.</li>
  <li> Removed --disable-gnome-hints and --disable-ewmh configure  options.</li>
  <li> All single letter variables are deprecated now; new variables:    $[w.id], $[w.name], $[w.iconname], $[w.class], $[w.resource],    $[desk.n], $[version.num], $[version.info], $[version.line],    $[desk.pagesx], $[desk.pagesy]</li>
</ul>


<a name="2.5.5"></a>
<h4>Changes in development release 2.5.5 (2-Dec-2002) <a href="#top">[top]</a></h4>
<ul>
  <li> Added support for joining and shaping in bi-directional  languages that need this.</li>
  <li> ButtonStyle and TitleStyle new style type Colorset.</li>
  <li> New experimental module FvwmProxy.</li>
  <li> New command RestackTransients.</li>
  <li> Added a pixel offset to vector button definitions.</li>
  <li> New command FocusStyle as a shorthand for setting the FP...  styles with the Style command.</li>
  <li> New option Locale to PrintInfo command.</li>
  <li> The Next and Prev commands start looking for a matching window at  the context window if there is any.</li>
  <li> The MoveToPage command does nothing with sticky windows.</li>
  <li> New module FvwmWindowLister, a WindowList substitute.</li>
  <li> Sticky windows can be sticky across pages, across desks or both.  Related to this are:</li>
  <li> New commands StickAcrossPages and StickAcrossDesks.</li>
  <li> New Style options StickyAcrossPages and StickyAcrossDesks.</li>
  <li> New conditional command options StickyAcrossPages and     StickyAcrossDesks.</li>
  <li> New WindowList options NoStickyAcrossPages,     NoStickyAcrossDesks, StickyAcrossPages, StickyAcrossDesks,     OnlyStickyAcrossPages, OnlyStickyAcrossDesks.</li>
  <li> New FvwmRearrange options -sp and -sd.</li>
  <li> Fixed flickering in FvwmTaskBar, FvwmWinList, FvwmIconBox,  FvwmForm, FvwmScript and FvwmScroll when xft fonts or icons with  an alpha channel is used.</li>
  <li> New Colorset option RootTransparent</li>
  <li> The Transparent Colorset option can be tinted under certain  conditions</li>
  <li> New MinHeight option to TitleStyle</li>
</ul>


<a name="2.5.4"></a>
<h4>Changes in alpha release 2.5.4 (20-Oct-2002) <a href="#top">[top]</a></h4>
<ul>
  <li> FvwmTaskBar may now include mini launch buttons using the Button  command.  Also has new options for spacing the buttons:  WindowButtonsLeftMargin, WindowButtonsRightMargin, and  StartButtonRightMargin.  See man page for details.</li>
  <li> Style switches can be prefixed with '!' to inverse their meaning.  For example, &quot;Style * Sticky&quot; is the same as &quot;Style * !Slippery&quot;.  This works *only* for pairs of styles that take no arguments and  for the Button and NoButton styles.</li>
  <li> New button property Id in FvwmButtons. FvwmButtons now accepts  dynamical actions using SendToModule, see the man page:    ChangeButton &lt;button-id&gt; &lt;properties-to-change&gt;    ExpandButtonVars &lt;button-id&gt; &lt;command-to-expand&gt;</li>
  <li> New Colorset options bgTint, fgTint (which complete Tint), Alpha,  IconTint and IconAlpha.</li>
  <li> Alpha blending rendering is supported even without XRender  support.</li>
  <li> Enhanced commands [Add]ButtonStyle, [Add]TitleStyle. ButtonState.  Titles and buttons now have 4 main states instead of 3: ActiveUp,  ActiveDown, InactiveUp and InactiveDown, plus 4 Toggled variants.  Several shortcuts added: Active means ActiveUp + ActiveDown,  Inactive means InactiveUp + InactiveDown, similarly for shortcuts  ToggledActive and ToggledInactive.</li>
  <li> More shortcuts for button states added: AllNormal, AllToggled,  AllActive, AllInactive, AllUp, AllDown.  These six shortcuts are  actually different masks for 4 individual states (from 8 total).</li>
  <li> FPClickToFocus and FPClickToRaise work with any modifier by  default.</li>
  <li> Perl library API regarding event handlers is changed, so personal  modules in Perl should be adjusted.</li>
  <li> Allow the use of mouse buttons other than the first in  FvwmWinList when invoked transient.</li>
  <li> ImagePath now supports directories in form &quot;/some/directory;.png&quot;  (where semicolon delimits a file extension that files in  /some/directory have.  This file extension replaces the original  image extension (if any) or it is added if there is no extension.  For example with: Style XTerm MiniIcon mini/xterm.xpm  the file /some/directory/mini/xterm.png is searched.</li>
  <li> New graphical debugger module FvwmGtkDebug.</li>
  <li> New command NoWindow for removing the window context.</li>
  <li> New FvwmIconMan option ShowTransient.</li>
  <li> All conditions have a negation.</li>
  <li> New FvwmBacker option RetainPixmap.</li>
  <li> Fixed flickering in menus, icon title, FvwmButtons, FvwmIconMan  and FvwmPager when xft fonts or icons with an alpha channel is  used.</li>
  <li> FvwmButtons redrawing improvement: colorsets are now usable with  containers.</li>
  <li> FvwmIconMan options PlainColorset, IconColorset, FocusColorset  and SelectColorset are now strictly respected.</li>
  <li> The HilightBack and ActiveFore menu styles are independent of  each other.  HilightBack without using ActiveFore does no longer  hilight the item text.</li>
  <li> New WindowList option SortByResource; the previously added  SortClassName option is renamed to SortByClass.</li>
  <li> New command PrintInfo for debugging.</li>
</ul>


<a name="2.5.3"></a>
<h4>Changes in alpha release 2.5.3 (25-Aug-2002) <a href="#top">[top]</a></h4>
<ul>
  <li> TitleStyle MultiPixmap now works once again.</li>
  <li> Removed the old module interface for ConfigureWindow  packets. External modules relying on this interface no longer  work.</li>
  <li> Fixed interaction bug between CascadePlacement and StartsOnPage</li>
  <li> if the target page was at a negative x or y page displacement  from the current view port, the window would be placed on the  wrong page.</li>
  <li> New Style option IconSize for restricting icon sizes.</li>
  <li> New WindowList options SortClassName, MaxLabelWidth, NoLayer,  ShowScreen, ShowPage, ShowPageX and ShowPageY.</li>
  <li> Restored old way of handling clicks in windows with ClickToFocus  and ClickToFocusPassesClickOff.  This fixes a problem with  click+drag in an unfocused rxvt or aterm window.</li>
  <li> Fixed wrong warp coordinates when WarpToWindow was used with two  arguments on an unmanaged window.</li>
  <li> Vastly improved FvwmEvent performance.</li>
  <li> FvwmAuto can operate on Enter and Leave events too. This makes  it possible to have auto raising with ClickToFocus and  NeverFocus. See -menter and -menterleave options and examples in  the FvwmAuto man page.</li>
  <li> The &quot;hangon&quot; strings in FvwmButtons support wild cards.</li>
  <li> New option &quot;Icon&quot; to PlaceAgain command.</li>
  <li> New option &quot;FromPointer&quot; and direction &quot;Center&quot; to the Direction  command.</li>
  <li> The styles ClickToFocusRaises(Off) and  MouseFocusClickRaises(Off) are now different names for the same  style.  Configurations that used    Style * ClickToFocus, ClickToFocusRaises    Style * MouseFocusClickRaisesOff  or vice versa no longer work as like before.  Remove the second  line to fix the problem.  ClickToFocusRaises now works only on  the client part of a window, not on the decorations as it did  before.</li>
  <li> New color limit method for screens that only display 256 colors  (or less).</li>
  <li> In depth less or equal to 16 image and gradient can be  dithered. This can be enabled/disabled by using the new  dither/nodither options to the Colorset command.</li>
  <li> Removed the styles MouseFocusClickIgnoreMotion and  MouseFocusClickIgnoreMotionOff again.</li>
  <li> Many new focus policy styles &quot;FP...&quot; and &quot;!FP...&quot;.</li>
</ul>


<a name="2.5.2"></a>
<h4>Changes in alpha release 2.5.2 (24-Jun-2002) <a href="#top">[top]</a></h4>
<ul>
  <li> Fonts can have shadow effects, see the FONT SHADOW EFFECTS  section of fvwm manual page.</li>
  <li> New Colorset options: fgsh for shadow text and fg_alpha for  merging text with the background.</li>
  <li> New module FvwmPerl adds perl scripting ability to fvwm  commands.</li>
  <li> Provided powerful perl library for creating FVWM modules in  perl.</li>
  <li> New WindowList option IconifiedtAtEnd.</li>
  <li> Always display the current desk number in the FvwmPager window  title.</li>
  <li> Allow to bind a function to the focus click and pass it to the  application at the same time.</li>
  <li> New styles !Borders and Borders to enable or disable window  borders.</li>
  <li> Removed the --enable-multibyte configure option. Multibyte  support is now compiled in unconditionally.</li>
  <li> New FvwmButtons option ActionOnPress enables execution of action  on press rather than on release for any specific button.</li>
  <li> Improved CascadePlacement, the last used position is reused if  the last placed window does not exist any more.</li>
  <li> FvwmIconMan may now change the resolution dynamically, just  issue &quot;*FvwmIconMan: resolution page&quot; while FvwmIconMan is  running.</li>
  <li> New command XineramaSlsScreens.</li>
  <li> MoveToPage and MoveToDesk no longer unstick windows.</li>
  <li> It is possible to specify a string encoding in a font name, see  the &quot;FONT AND STRING ENCODINGS&quot; section of fvwm manual page.</li>
</ul>


<a name="2.5.1"></a>
<h4>Changes in alpha release 2.5.1 (26-Apr-2002) <a href="#top">[top]</a></h4>
<ul>
  <li> Changed the executable and the man page names from fvwm2 to  fvwm. The old names are still supported by symlinking.</li>
  <li> All fvwm utilities are renamed to conform to the &quot;fvwm-&quot;  scheme. fvwm-bug, fvwm-root (was xpmroot), fvwm-config,  fvwm-convert-2.4.</li>
  <li> Added a full support for the side window titles. New Style  options TitleAtLeft and TitleAtRight added to TitleAtTop and  TitleAtBottom.</li>
  <li> A title text may now be optionally rotated for both vertical and  horizontal title directions, search for &quot;Rotated&quot; in the man  page.</li>
  <li> Added support for loading images in PNG (including alpha  blending) and XBM formats anywhere.</li>
  <li> New commands Schedule and Deschedule.</li>
  <li> New command State. New conditions State and !State.</li>
  <li> New commands XSync and XSynchronize for debugging purposes.</li>
  <li> In interactive move/placement when Alt/Meta modifier is pressed,  snap attraction (SnapAttraction, SnapGrid and EdgeResistance) is  ignored.</li>
  <li> New flags (No)FvwmModule to FvwmButtons Swallow option</li>
  <li> The I18N_MB patch (--enable-multibyte) has been  rewritten. MULTIBYTE is used to identify what is was I18N_MB. A  set of locale functions (locale initialization, font loading,  text drawing, ...etc.) is created in libs/Flocale.{c,h} and used  in the entire fvwm code (but FvwmWharf).  Font loading and  memory management is improved in the multibyte case.</li>
  <li> Better support of non ISO-8859-1 window and icon titles. See the  --disable-compound-text option in INSTALL.fvwm for more  details.</li>
  <li> Added anti-aliased text rendering support using Xft (use  --enable-xft to enable it). Recent versions of XFree and  freetype2 are needed (see the FONT NAMES AND FONT LOADING  section of the fvwm manual page).</li>
  <li> Conditional commands now have a return code (Match, NoMatch or  Error).  This return code can be checked and tied to an action  with the new commands Cond and CondCase.</li>
  <li> Bindings can be made to the separate parts of the window border  with the new contexts '[', ']', '-', '_', '&lt;', '^', '&gt;' and  'v'.</li>
  <li> New parameters for FvwmRearange: -maximize and -animate.</li>
  <li> New option StartCommand for FvwmTaskBar to allow placing the  StartMenu correctly.    *FvwmTaskBar: StartCommand Popup RootMenu \  Please refer to the FvwmTaskBar man page for details.</li>
  <li> New extended variables pointer.x, pointer.y, pointer.wx,  pointer.wy, pointer.cx and pointer.cy.</li>
  <li> The Current command does not select a random window when no  window has the focus.</li>
  <li> New color '@4' (transparent) in button vectors.</li>
  <li> New option &quot;Frame&quot; for the Resize and ResizeMove commands.</li>
  <li> Added direction options to WindowShade command. Windows can be  shaded in any of the eight compass directions.</li>
  <li> Styles WindowShadeLazy (default), WindowShadeBusy and  WindowShadeAlwaysLazy to optimize performance of the WindowShade  command.</li>
  <li> The DO_START_ICONIC flag is no longer supported in the module  interface.</li>
  <li> Added bi-directional text support for Asian charsets.</li>
  <li> New option MinimalLayer for FvwmIdent to control window layer.</li>
  <li> New FvwmIconMan configuration syntax now conforms to the syntax  of other modules, see the man page.</li>
  <li> FvwmForm can automatically run commands after a timeout  interval.</li>
  <li> Fvwm commands can be invoked when the edge of the screen is hit  with the mouse.</li>
  <li> New commands Colorset, ReadWriteColors and CleanupColorsets  allow the colorset functionality previously available using  FvwmTheme.</li>
  <li> FvwmTheme is obsolete now, but still supported for some time.</li>
  <li> New options Tint, TintMask and NoTint to colorsets.</li>
  <li> New WindowList option CurrentAtEnd.</li>
  <li> New weighted sorting in FvwmIconMan.</li>
</ul>


<a name="2.5.0"></a>
<h4>Changes in alpha release 2.5.0 (27-Jan-2002) <a href="#top">[top]</a></h4>
<ul>
  <li> New commands ResizeMaximize and ResizeMoveMaximize that modify  the maximized geometry of windows and maximize them as  necessary.  Very useful to make a window larger manually and  then get back the old geometry with a click.</li>
  <li> New command ResizeMoveMaximize similarly.</li>
  <li> New styles FixedPPosition, FixedUSPosition, FixedSize,  FixedUSSize, FixedPSize, VariablePPosition, VariableUSPosition,  VariableSize, VariableUSSize, and VariablePSize.</li>
  <li> Actions can be bound to windows swallowed in FvwmButtons. To  disable this feature for a specific button, the new option  ActionIgnoresClientWindow can be used.</li>
  <li> Fvwm respect the extended window manager hints  specification. This allows fvwm to work with KDE version &gt;= 2  and GNOME version 2. This support is configurable using a bunch  of new commands and style options, search for &quot;EWMH&quot; in the man  page.</li>
  <li> New DateFormat option in FvwmTaskBar to change the date format  in the clock's popup tip.</li>
  <li> Window titlebars may now be designed using a new powerful  TitleStyle option MultiPixmap, that enables to specify separate  pixmaps for different parts of the titlebar: Main, LeftEnd,  LeftOfText, UnderText, RightOfText, RightEnd and more.</li>
  <li> New styles MinOverlapPlacementPenalties and  MinOverlapPercentPlacementPenalties.</li>
  <li> New styles IndexedWindowName / ExactWindowName and  IndexedIconName / ExactIconName.</li>
  <li> New command &quot;DesktopName desk name&quot; to define the name of a  desktop for the FvwmPager, the WindowList and EWMH compliant  pagers. New expanding variables $[desk.name&lt;n&gt;] for the desktop  names.</li>
  <li> New window list options NoDeskNum, NoCurrentDeskTitle,  TitleForAllDesks, NoNumInDeskTitle.</li>
  <li> New emacs style bindings in menus.</li>
  <li> New Maximize global flag &quot;layer&quot; which causes the various grow  methods to ignore the windows with a layer less than or equal to  the layer on the window which is maximized.</li>
  <li> Better support of the Transparent colorset in the modules and in  animated menus.</li>
  <li> Amelioration of the WindowShade animation.</li>
  <li> New ButtonStyle and TitleStyle option MwmDecorLayer.</li>
  <li> New style BackingStoreWindowDefault which is the default  now. Fvwm no longer disables backing store on windows by  default.</li>
  <li> New styles MouseFocusClickIgnoreMotion and  MouseFocusClickIgnoreMotionOff.</li>
  <li> The module interface now supports up to 62 message types.</li>
  <li> New module messages MX_ENTER_WINDOW and MX_LEAVE_WINDOW.</li>
  <li> New events &quot;enter_window&quot; and &quot;leave_window&quot; in FvwmEvent.</li>
  <li> New MenuStyle PopupActiveArea.</li>
  <li> New command line option -passid to FvwmAuto.</li>
  <li> New conditional commands Any and PointerWindow.</li>
  <li> New conditions Focused, !Focused, HasPointer and !HasPointer.</li>
</ul>


<a name="2.4.15"></a>
<h4>Changes in stable release 2.4.15 (24-Jan-2003) <a href="#top">[top]</a></h4>
<ul>
  <li> Fix for gmplayer launched by fvwm. Close stdin on Exec so the  exec'd process knows its not running interactively.</li>
  <li> Windows using the WindowListSkip style do not appear in the  FvwmTaskBar at random.</li>
  <li> Fixed a memory leak in ChangeIcon, ChangeForeColor and  ChangeBackColor FvwmScript Instruction.</li>
  <li> Fixed a core dump in the parsing of FvwmAuto arguments.</li>
  <li> Fixed screwed calculation of icon picture size when application  specifies it explicitly.</li>
  <li> The option ShowOnlyIcons now works as described in the  FvwmIconMan man page.  It was accidentally named ShowOnlyIconic  before.</li>
</ul>


<a name="2.4.14"></a>
<h4>Changes in stable release 2.4.14 (29-Nov-2002) <a href="#top">[top]</a></h4>
<ul>
  <li> Modules do not crash anymore when more than 126 windows are on  the desktop.</li>
  <li> FvwmIconMan displays windows correctly that were iconified and  then moved to another page.</li>
  <li> Application provided icon windows no longer appear at 0 0 when  restarting.</li>
  <li> The built-in session management can handle window names, classes  etc. beginning with whitespace (textedit).</li>
  <li> Removed the flawed &quot;A&quot;ny context key binding patch from 2.4.13.</li>
  <li> The default EdgeScroll (if not specified) was incorrectly  assumed to be 100 pixels instead of 100 percents.</li>
  <li> Icons no longer appear on top of all other windows after a  restart.</li>
</ul>


<a name="2.4.13"></a>
<h4>Changes in stable release 2.4.13 (1-Nov-2002) <a href="#top">[top]</a></h4>
<ul>
  <li> Icon titles for windows with an icon position hint no longer  appear at random places.</li>
  <li> Fvwm no longer displays two icon pictures when switching from  NoIconOverride to IconOverride with windows that provide their  own icon window.</li>
  <li> The Current, All, Pick, ThisWindow and PointerWindow commands  work on shaded windows too.</li>
  <li> Fixed a problem stacking iconified transients.</li>
  <li> No more flickering when raising transients.</li>
  <li> Fixed a number of problems with window stacking, some new in  2.4.10 or later, some older problems that have been around for a  long time.</li>
  <li> Windows starting lowered or on any layer other than the default  layer are displayed at the right place in FvwmPager.</li>
  <li> Bindings with the &quot;A&quot;ny context can not be overridden by Gnome  panel or OpenOffice.</li>
</ul>


<a name="2.4.12"></a>
<h4>Changes in stable release 2.4.12 (10-Oct-2002) <a href="#top">[top]</a></h4>
<ul>
  <li> Fixed drawing problems with TiledPixmap and Solid MenuFaces which  appeared in 2.4.10, replacing the same problem with ?Gradient  MenuFaces in 2.4.9.</li>
  <li> Fixed accidental menu animation with certain menu position hints.</li>
  <li> Increased maximum allowed key symbol name length to 200  characters.</li>
  <li> Allow quotes in conditional command conditions.</li>
  <li> Fixed starting Move at random position when pointer is on a  different screen.</li>
  <li> Transient windows do not appear in FvwmWinList after they have  been moved on the desktop.</li>
</ul>


<a name="2.4.11"></a>
<h4>Changes in stable release 2.4.11 (20-Sep-2002) <a href="#top">[top]</a></h4>
<ul>
  <li> Allow the use of mouse buttons other than the first in  FvwmWinList when invoked transient.</li>
  <li> Fixed a crash with ssh-askpass introduced in 2.4.10.</li>
</ul>


<a name="2.4.10"></a>
<h4>Changes in stable release 2.4.10 (15-Sep-2002) <a href="#top">[top]</a></h4>
<ul>
  <li> The commands Maximize, Resize and ResizeMove can be used on icons  as it was in 2.2.x.</li>
  <li> Fixed hilighting of menu items with HGradient and VGradient  MenuFace.  Reduced flickering with these options.</li>
  <li> Fixed a minor problem with entering submenus via keyboard.</li>
  <li> Fixed race conditions in FvwmTaskBar with AutoStick that caused  it to hang.</li>
  <li> Fixed drawing of pager balloons with BalloonBack option.</li>
  <li> Fixed drawing of SidePic menu background with B/D gradients.</li>
  <li> Fixed drawing of menu item reliefs with gradient menu faces.</li>
  <li> Fixed key bindings on window corners.</li>
  <li> Fixed FvwmTaskBar i18n font loading</li>
  <li> Fixed StackTransientParent style without RaiseTransient or  LowerTransient on the parent window.</li>
  <li> StackTransientParent works only on parent window if it is on the  same layer.</li>
  <li> Fixed handling of window group hint with the (De)Iconify  command.</li>
  <li> No more flickering when a transient overlapping its parent window  is lowered.</li>
  <li> Fixed hilighting of unfocused windows.</li>
</ul>


<a name="2.4.9"></a>
<h4>Changes in stable release 2.4.9 (11-Aug-2002) <a href="#top">[top]</a></h4>
<ul>
  <li> Fixed interaction bug between CascadePlacement and StartsOnPage -  if the target page was at a negative x or y page displacement  from the current viewport, the window would be placed on the  wrong page.</li>
  <li> Fixed a problem with colormap transition when a transient window  died.</li>
  <li> Fixed a FvwmScript crash with Swallow widget and very long window  names.</li>
  <li> Restored old way of handling clicks in windows with ClickToFocus  and ClickToFocusPassesClickOff.  This fixes a problem with  click+drag in an unfocused rxvt or aterm window.</li>
  <li> Fixed problems with $fg and $bg variables in FvwmButtons when the  UseOld option was used.</li>
  <li> Fixed wrong warp coordinates when WarpToWindow was used with two  arguments on an unmanaged window.</li>
  <li> Added a workaround for popup menus in TK applications that appear  on some random position.</li>
  <li> Fixed problems with wish scripts creating windows that start  iconic.</li>
  <li> Fixed the NoClose option with unmapped panels in FvwmButtons.</li>
  <li> A number of drawing fixes in FvwmPager.</li>
  <li> Fixed a slight bug when waiting until all buttons are released,  for example after executing a complex function.</li>
  <li> Fixed potentially harmful change in module interface.</li>
  <li> Fixed displaying menu items with icons when using the MenuStyle  SubmmenusLeft.</li>
  <li> Fixed problems with the pointer moving off screen in a multi  head setup.</li>
  <li> Fixed a potential crash with windows being destroyed during a  recapture operation.</li>
  <li> Fixed a memory leak in some modules when not using glibc.</li>
  <li> Applications using Mwm hints can now enforce that a window can  not be moved.</li>
  <li> Fixed negative arguments of WarpToWindow when used on an  unmanaged window.</li>
  <li> DESTDIR may be fully used again (only useful for distributors).</li>
  <li> Fixed a key binding problem with key symbols that are generated  by several keys.</li>
  <li> Fixed a possible crash when a window was recaptured and the  focus could not be transfered to another window.</li>
  <li> Fixed a minor problem with clicks on focused windows being  ignored.</li>
  <li> fvwm-menu-headlines: added support for CNN and BBC headlines.</li>
  <li> Fixed a performance problem with large numbers of mouse binding  commands.</li>
</ul>


<a name="2.4.8"></a>
<h4>Changes in stable release 2.4.8 (11-Jun-2002) <a href="#top">[top]</a></h4>
<ul>
  <li> A fix for switching between czech and us keyboard layout.</li>
  <li> Remember the icon position when an icon is moved  non-interactively.</li>
  <li> Setup &quot;fvwm&quot; and &quot;fvwm-root&quot; name symlinks for the executable and  the man page when installing, see INSTALL.fvwm.</li>
  <li> Fixed another problem with the DeskOnly option and sticky icons  in FvwmTaskBar.</li>
  <li> New FvwmIconMan configuration syntax now conforms to the syntax  of other modules, see the man page.</li>
  <li> New WindowList option CurrentAtEnd.</li>
  <li> Fixed maximal length of a named module packet</li>
  <li> Fixed a crash on a config with a new 2.5.x Colorset command.</li>
  <li> Always display the current desk number in the FvwmPager window  title.</li>
  <li> Allow to bind a function to the focus click and pass it to the  application at the same time.</li>
  <li> Fixed a problem with fvwm not accepting keyboard input when the  application with the focus vanished at the start of a session.</li>
  <li> A small security patch regarding TMPDIR.</li>
  <li> Fixed a problem with colormap transition when a transient window  died.</li>
  <li> Fixed calculation of average bg colour in colour sets with large  pictures.</li>
  <li> Fixed some minor problems regarding the multibyte patch.</li>
  <li> Fixed selection in FvwmScript List widget.</li>
  <li> fvwm-menu-headlines: updated the site data, added a configurable  timeout on socket reading (20 sec) to avoid fvwm hanging, new  --icon-error option.</li>
  <li> Fixed a problem with ClickToFocus + ClickToFocusRaisesOff and  windows that are below others.</li>
  <li> Fixed the ClickToFocusPassesClick style.</li>
  <li> Fixed CascadePlacement for huge windows, so that the top-left  corner is always visible.</li>
  <li> Fixed parsing of SendToModule with the first parameter quoted.</li>
  <li> Fonts in double quotes now should work in module configurations.</li>
  <li> Fixed copying PopupOffset values in CopyMenuStyle.</li>
</ul>


<a name="2.4.7"></a>
<h4>Changes in stable release 2.4.7 (11-Apr-2002) <a href="#top">[top]</a></h4>
<ul>
  <li> Fixed parsing of WindowList with conditions and a position at  the same time that was broken in 2.4.6.</li>
  <li> Fixed some problems with the DeskOnly option of FvwmTaskBar  (windows were duplicated when moving to a different Desk; the  StickyIcon style was ignored).</li>
  <li> Fixed config.h warnings with some compilers introduced in 2.4.6.</li>
  <li> Fixed icon titles being raised when they should not be.</li>
  <li> Fixed initial drawing of the internals of the FvwmPager window.</li>
  <li> Fixed the FvwmAudio compatible mode in FvwmEvent when external  audio player is used.</li>
  <li> Fixed execution on QNX.</li>
</ul>


<a name="2.4.6"></a>
<h4>Changes in stable release 2.4.6 (10-Mar-2002) <a href="#top">[top]</a></h4>
<ul>
  <li> Better support of non ISO-8859-1 window and icon titles. See the  --disable-compound-text option in INSTALL.fvwm for more details.</li>
  <li> Improved speed of opaque window movement/resizing.</li>
  <li> Fixed a bug that caused windows not being raised and lowered  properly.</li>
  <li> Suppress error message when using XBM icons.</li>
  <li> Fixed a read descriptor problem in FvwmTaskBar</li>
  <li> Fixed a minor colour update bug in the pager.</li>
  <li> Fixed an fvwm crash when a module died at the wrong moment;  specifically a transient FvwmPager or FvwmIconMan.</li>
  <li> Fixed placement of WindowList on wrong Xinerama screen when  called without any options on a screen other than the primary  screen.</li>
  <li> Fixed a problem with root bindings and xfishtank.</li>
  <li> Fixed moving windows with the keyboard over the edge of the  screen when the pointer remained of the previous page.</li>
  <li> Do not hilight windows after ResizeMove.</li>
  <li> New conditional command ThisWindow.</li>
  <li> Some fixes in the configure script that caused some rare  problems detecting gnome and ncurses.</li>
  <li> Fixed a memory leak in the Pick command.</li>
  <li> Allow to choose windows with CirculateSkip with the Pick command.</li>
  <li> Fixed an FvwmScript compile problem on dec-osf5.</li>
  <li> The window handles are now resizes as they should when the  HandleWidth style changes.</li>
  <li> The Current command does not select a random window when no  window has the focus.</li>
  <li> Fixed a rare menu placement problem with Xinerama.</li>
</ul>


<a name="2.4.5"></a>
<h4>Changes in stable release 2.4.5 (27-Jan-2002) <a href="#top">[top]</a></h4>
<ul>
  <li> Fixed minor problems in popping sub menus up and down.</li>
  <li> Fixed moving windows between pages with the keyboard.</li>
  <li> Fixed the size of the geometry window that was broken sometimes.</li>
  <li> Fixed problem with pointer warping to another screen on a dual  head setup.</li>
  <li> Fixed a problem with the focus in internal Ddd and Netscape  windows.</li>
  <li> Reduced the time in which fvwm attempts to grab the pointer.</li>
  <li> Fixed unmanaged window when window was mapped/unmapped/mapped too  fast.</li>
  <li> Fixed MiniScroll's auto repeating in FvwmScript.</li>
  <li> Fixed a crash with the UseStyle style in combination with  HilightBack.</li>
  <li> Fixed excessive redraws of the windows under a window being  shaded.</li>
  <li> Fixed a minor memory leak in the Style command.</li>
  <li> Fixed pixmap background of FvwmButtons behind buttons with only  text.</li>
  <li> Fixed a crash in FvwmIconBox when the application provided an  illegal icon.</li>
  <li> Fixed a configure problem with libstroke-0.5.1.</li>
  <li> New style BackingStoreWindowDefault which is the default  now. Fvwm no longer disables backing store on windows by  default.</li>
  <li> Fixed bug that sometimes caused unnecessary redraws when a style  was changed.</li>
  <li> Fixed crash when something like &quot;$[$v]&quot; appeared in a command.</li>
  <li> Fixed parsing of conditions with more than one comma.</li>
</ul>


<a name="2.4.4"></a>
<h4>Changes in stable release 2.4.4 (16-Dec-2001) <a href="#top">[top]</a></h4>
<ul>
  <li> Minor title drawing fixes.</li>
  <li> Fixed manual placement with Xinerama.</li>
  <li> Minor button 3 handling fix in FvwmPager.</li>
  <li> Fixed *FvwmIconMan*shaped option with empty managers.</li>
  <li> Fixed ClickToFocusClickRaises style.</li>
  <li> FvwmForm: Customize pointers, support ISO_Tab key, buttons can  activate on press or release, special pointer during grab, arrow  keys useful in form with one input field.</li>
  <li> New OpaqueMoveSize argument &quot;unlimited&quot;.</li>
  <li> Fixed binding keys with and without &quot;Shift&quot; modifier under some  circumstances.</li>
  <li> Fixed binding actions to the client window with ClickToFocus.</li>
  <li> Mouse bindings are activated without a recapture.</li>
  <li> FvwmScript: new keyboard bindings. New flags NoFocus and Left,  Center, and Right for text position. Amelioration of the Menu  and PopupMenu Widgets. New functions GetPid, Parse,  SendMsgAndGet and LastString. New instruction Key for key  bindings. New command SendToModule ScriptName SendString.</li>
  <li> Command &quot;Silent&quot; when precedes &quot;Key&quot;, &quot;Mouse&quot; and &quot;PointerKey&quot;  disables warning messages.</li>
  <li> Restored the default Alt-Tab behaviour from 2.4.0.</li>
</ul>


<a name="2.4.3"></a>
<h4>Changes in stable release 2.4.3 (08-Oct-2001) <a href="#top">[top]</a></h4>
<ul>
  <li> Fixed activation of shape extension.</li>
  <li> Fixed problems with overriding key bindings.</li>
  <li> Single letter key names are allowed in upper and lower case in  key bindings as before 2.4.0.</li>
  <li> Fixed WindowList placement with Xinerama.</li>
  <li> Fixed flickering icon titles.</li>
  <li> New X resource fvwmscreen to select the Xinerama screen on which  to place new windows.</li>
  <li> Coordinates of a window during motion are show relative to the  Xinerama screen.</li>
  <li> Some icon placement improvements with Xinerama.</li>
</ul>


<a name="2.4.2"></a>
<h4>Changes in stable release 2.4.2 (16-Sep-2001) <a href="#top">[top]</a></h4>
<ul>
  <li> Desk and page can be given as X resources in .Xdefaults, for  example:    xterm.desk: 1    xterm.page: 1 2 3</li>
  <li> Several Shape compilation problems fixed.</li>
</ul>


<a name="2.4.1"></a>
<h4>Changes in stable release 2.4.1 (15-Sep-2001) <a href="#top">[top]</a></h4>
<ul>
  <li> Added Xinerama and SingleLogicalScreen support.</li>
  <li> New commands Xinerama, XineramaPrimaryScreen, XineramaSls,  XineramaSlsSize and MoveToScreen.</li>
  <li> New context rectangle option XineramaRoot for the menu commands.</li>
  <li> New conditions CurrentGlobalPage, CurrentGlobalPageAnyDesk and  AcceptsFocus for conditional commands.</li>
  <li> The DestroyStyle command takes effect immediately.</li>
  <li> New style option StartsOnScreen.</li>
  <li> New style options NoUSPosition, UseUSPosition,  NoTransientPPosition, UseTransientPPosition,  NoTransientUSPosition, and UseTransientUSPosition.  These work  similar to the old styles NoPPosition and UsePPosition.</li>
  <li> New option &quot;screen&quot; for Maximize command.</li>
  <li> New option ReverseOrder for WindowList command.</li>
  <li> The default Alt-Tab binding works more intuitive.</li>
  <li> New condition &quot;PlacedByFvwm&quot;</li>
  <li> New Geometry option for FvwmForm.</li>
  <li> New Screen resolution and ShowOnlyIcons options for FvwmIconMan.</li>
  <li> FvwmIconMan can be closed with Delete or Close too.</li>
  <li> New options PageOnly and ScreenOnly for FvwmTaskBar.</li>
  <li> FvwmIconBox, FvwmTaskBar and FvwmWinList support aliases.</li>
  <li> Enhancements in fvwm-menu-headlines and support for 10 more  sites.</li>
  <li> Color enhancements in button vectors: @2 is bg color, @3 is fg  color.</li>
  <li> Improved detection of the Shape library.</li>
  <li> Fixed FvwmButtons button titles not being erased for swallowed  windows that showed up on certain setups.</li>
  <li> Fixed bug that caused transient windows to be buried below their  parents with the &quot;BugOpts RaiseOverUnmanaged on&quot;.  This occured  with the system.fvwm2rc-sample-95 configuration.</li>
  <li> The modules FvwmPager, FvwmIconMan, FvwmWinList and FvwmButtos  set the transient_for hint when started with the &quot;transient&quot;  option.</li>
  <li> Fixed FvwmIconMan with the transient option when mapped off  screen.</li>
  <li> Fixed ClickToFocus focus policy when iconifying the focused  window.</li>
  <li> Fixed some focus problems in conjunction with unclutter vs  xv/xmms and Open Look applications.</li>
  <li> Fixed a problem that could cause windows to be lost off screen  with interactive window motion.</li>
  <li> Fixed some FvwmTaskBar autohide problem.</li>
  <li> Fixed a display string problem in FvwmForm.</li>
  <li> Fixed a problem with FvwmTheme shadow colours.</li>
  <li> Fixed the CirculateSkipIcon and CirculateSkipShaded options in  conditional commands.</li>
  <li> Fixed a formatting problem of the man page on AIX, Solaris, and  some other UNIX variants.</li>
  <li> Fixed a problems with FvwmIconBox exiting on 64 bit platforms.</li>
  <li> Fixed FvwmIconBox crashes with MaxIconSize dimensions 0.</li>
  <li> Fixed parameters of fvwm24_convert.</li>
  <li> Fixed a number of building problems related to old vendor unices,  libstroke-0.5, autoconf-2.50, bogus gnome-config and imlib-config.</li>
  <li> Fixed drawing of title bar buttons with MWMDecorStick.</li>
  <li> Fixed missing button or key events over the pan frames.</li>
  <li> Fixed placement of the FvwmDragWell, FvwmButtons and FvwmForm  modules.</li>
  <li> Fixed parsing double quotes in FvwmPager's Font and SmallFont  options. Fixed FvwmPager crash with certain font strings.</li>
  <li> Fixed drawing of the grid lines in an iconified FvwmPager window.</li>
  <li> Fixed button grabbing problem for buttons &gt; 3 in FvwmTaskBar.</li>
  <li> Fixed some exotic problems with window gravity and resizing  windows.</li>
  <li> Fixed a problem with maximizing windows with the vieport not  starting on a page boundary.</li>
  <li> Fixed handling of parentheses in FvwmButtons button actions.</li>
  <li> Work around a key binding problem with keys that generate the  same symbol with more than one key code (e.g. Shift-F1 = F11).</li>
  <li> The Desk option of FvwmBacker is compatible to earlier  version. Desk or Page coordinates can be omitted to indicate  that desk or page changes trigger no action at all.</li>
  <li> Fixed double updating of background with FvwmBacker sometimes  leading to the wrong background.</li>
  <li> Fixed several escaping errors in fvwm-menu-directory, so files  and directories containing special chars and spaces should  work.</li>
  <li> Fixed PlacedByButton3 condition.</li>
  <li> Fixed vanishing windows when mapping/unmapping too fast.</li>
  <li> Fixed prev option of the GotoDeskAndPage command.</li>
  <li> Fixed calculations of X_RESOLUTION and Y_RESOLUTION for screen  dimmensions larger than 2147.</li>
  <li> Fixed compatibility of the FvwmM4 modules on platforms that have  a System V implementation of m4 (Solaris 2.6).</li>
  <li> The SetEnv command without a value for a variable is the same as  UnsetEnv.</li>
  <li> Fixed shading/unshading shaped windows and windows without title  and border.</li>
</ul>


<a name="2.4.0"></a>
<h4>Changes in stable release 2.4.0 (03-Jul-2001) <a href="#top">[top]</a></h4>
<ul>
  <li> Finally released. :)</li>
</ul>


<a name="2.3.33"></a>
<h4>Changes in beta release 2.3.33 (22-Jun-2001) <a href="#top">[top]</a></h4>
<ul>
  <li> Module configuration commands are now partially expanded  similarly to any other commands, except that single  alphabetic-letter parameters are not expanded for backward  compatibility.</li>
</ul>


<a name="2.3.32"></a>
<h4>Changes in beta release 2.3.32 (4-May-2001) <a href="#top">[top]</a></h4>
<ul>
  <li> Fixed several focus problems and several core dumps.</li>
  <li> Again allow full words &quot;Click&quot;, &quot;Hold&quot; as function specifiers  for backward compatibility.  Please don't use them.</li>
  <li> New configure --enable-command-log option.</li>
  <li> Fixed gdk-imlib configure detection for FvwmGtk.</li>
</ul>


<a name="2.3.31"></a>
<h4>Changes in beta release 2.3.31 (7-Apr-2001) <a href="#top">[top]</a></h4>
<ul>
  <li> New option &quot;recreate&quot; to DestroyDecor command.</li>
</ul>


<a name="2.3.30"></a>
<h4>Changes in beta release 2.3.30 (29-Mar-2001) <a href="#top">[top]</a></h4>
<ul>
  <li> The configure option --disable-modality was removed.</li>
  <li> New FvwmCommand -c option to read multiple commands from  standard input.</li>
</ul>


<a name="2.3.29"></a>
<h4>Changes in beta release 2.3.29 (2-Mar-2001) <a href="#top">[top]</a></h4>
<ul>
  <li> New temporary option -debug_stack_ring.</li>
  <li> New styles IconifyWindowGroupsTogether and IconifyWindowGroupsOff.</li>
  <li> New styles KeepWindowGroupsOnDesk and ScatterWindowGroups to  cope with applications using the window group hint incorrectly  (mozilla).</li>
  <li> New BugOpts option FlickeringQtDialogsWorkaround.</li>
  <li> New configure option --disable-package-subdirs, see INSTALL.fvwm  for info.</li>
  <li> New option &quot;None&quot; to the IconBox style.</li>
</ul>


<a name="2.3.28"></a>
<h4>Changes in beta release 2.3.28 (25-Jan-2001) <a href="#top">[top]</a></h4>
<ul>
  <li> Renamed configure option --enable-kanji to --enable-multibyte.</li>
  <li> Security fix related to .fvwm2rc being searched in the current  directory when $HOME is not set.</li>
  <li> New menu styles PopdownImmediately, PopdownDelayed and PopdownDelay.</li>
  <li> New command CopyMenuStyle.</li>
  <li> Replaced Dumb/SmartPlacement, Active/RandomPlacement,  SmartPlacement/Off style by ManualPlacement / CascadePlacement /  MinOverlapPlacement / MinOverlapPercentPlacement /  TileManualPlacement /TileCascadePlacement (old style still  supported).</li>
  <li> Replaced ActivePlacementHonorsStartsOnPage with  ManualPlacementHonorsStartsOnPage and  ActivePlacementHonorsStartsOnPageOff with  ManualPlacementHonorsStartsOnPageOff.</li>
  <li> We have two &quot;clever&quot; placement algorithms: MinOverlapPlacement  (the old one) and MinOverlapPercentPlacement.</li>
</ul>


<a name="2.3.27"></a>
<h4>Changes in beta release 2.3.27 (3-Jan-2001) <a href="#top">[top]</a></h4>
<a name="2.3.26"></a>
<h4>Changes in beta release 2.3.26 (26-Dec-2000) <a href="#top">[top]</a></h4>
<a name="2.3.25"></a>
<h4>Changes in beta release 2.3.25 (5-Dec-2000) <a href="#top">[top]</a></h4>
<ul>
  <li> Removed the now obsolete 'Recapture' option of the BusyCursor  command.</li>
</ul>


<a name="2.3.24"></a>
<h4>Changes in beta release 2.3.24 (28-Nov-2000) <a href="#top">[top]</a></h4>
<ul>
  <li> WindowId and WarpToFunction have been enhanced to handle windows  on different screens and unmanaged windows.</li>
  <li> New command FakeClick.</li>
</ul>


<a name="2.3.23"></a>
<h4>Changes in beta release 2.3.23 (25-Nov-2000) <a href="#top">[top]</a></h4>
<ul>
  <li> New styles UseIconPosition (default) and NoIconPosition.</li>
  <li> Better focus handling on multi head displays.</li>
</ul>


<a name="2.3.22"></a>
<h4>Changes in beta release 2.3.22 (10-Nov-2000) <a href="#top">[top]</a></h4>
<ul>
  <li> Configuration samples of FvwmForm and FvwmScript installed with  fvwm are converted to the scheme: &quot;FvwmForm-RootCursor&quot;,  &quot;FvwmScript-FileBrowser&quot;.</li>
  <li> New expanding variables: $., $[page.nx], $[page.ny].</li>
  <li> New command UnsetEnv unsets environment variables, compliments  SetEnv.</li>
  <li> Pressing mouse button 2 in an FvwmIdent window restarts FvwmIdent  and asks for a new window.</li>
  <li> New window styles GNOMEIgnoreHints and GNOMEUseHints to disable  GNOME hints for specific windows even if GNOME compliance is  compiled in.</li>
  <li> DestroyModuleConfig supports a non-conflicting syntax.</li>
  <li> Speed up command execution and startup.</li>
  <li> Improved handling of windows that set the &quot;input focus&quot; hint to  &quot;false&quot;.</li>
</ul>


<a name="2.3.21"></a>
<h4>Changes in beta release 2.3.21 (September 2000) <a href="#top">[top]</a></h4>
<ul>
  <li> Module configuration syntax now accepts a delimiter - colon and  optional spaces; the old syntax is supported as usual (but it  allows conflicts):    *FvwmIconBoxMaxIconSize 48x48    *FvwmIconBox: MaxIconSize 48x48</li>
  <li> SendToModule can accept aliases too.</li>
  <li> New option StrokeWidth for StrokeFunc.</li>
  <li> GNOME support is now &quot;on&quot; by default.</li>
</ul>


<a name="2.3.20"></a>
<h4>Changes in beta release 2.3.20 (July 2000) <a href="#top">[top]</a></h4>
<ul>
  <li> KillModule supports an optional alias parameter as given in  Module.    Module FvwmModule Alias    KillModule FvwmModule Alias</li>
</ul>


<a name="2.3.19"></a>
<h4>Changes in beta release 2.3.19 (June 2000) <a href="#top">[top]</a></h4>
<ul>
  <li> New command UpdateStyles forces an immediate style update, even  within a complex function.</li>
  <li> Implemented '$*' in complex functions. This works like in a  shell and is replaced by all arguments of a function.</li>
  <li> Implemented several new parameters:    $[desk.width], $[desk.height], $[vp.x], $[vp.y], $[vp.width],    $[vp.height], $[w.x], $[w.y], $[w.width], $[w.height],    $[screen], $[&lt;env-var&gt;]</li>
</ul>


<a name="2.3.18"></a>
<h4>Changes in beta release 2.3.18 (May 2000) <a href="#top">[top]</a></h4>
<ul>
  <li> Renamed the MovedButton3 contition to PlacedByButton3.</li>
  <li> Removed FlipTransient and DontFlipTransient styles (they never  worked anyway).</li>
  <li> Conditions can be separated by commas.</li>
  <li> Removed MoveSmoothness command.</li>
</ul>


<a name="2.3.17"></a>
<h4>Changes in beta release 2.3.17 (May 2000) <a href="#top">[top]</a></h4>
<ul>
  <li> The commands Refresh and RefreshWindow apply all outstanding  visual changes of a window.</li>
  <li> New options GrowUp, GrowDown, GrowLeft, GrowRight to the Maximize  command.</li>
  <li> New command ResizeMove combines Move and Resize commands.</li>
  <li> New options &quot;keep&quot; to Move command to leave either coordinate  unchanged.</li>
  <li> New options &quot;bottomright&quot; and &quot;br&quot; to Resize command.</li>
  <li> Resize command can take negative arguments. A &quot;keep&quot; argument  leaves the corresponding dimension untouched.</li>
  <li> New condition &quot;MovedButton3&quot; that is true if the last  interactive Move command was finished by pressing mouse button  3.</li>
  <li> Mouse button 3 can no longer be used to cancel interactive  window movement.</li>
  <li> $FVWM_USERHOME used to set the fvwm user directory renamed to  $FVWM_USERDIR.</li>
  <li> The default fvwm user directory is now $HOME/.fvwm, not $HOME,  the fvwm user directory is now created if needed.</li>
  <li> It is suggested to put all personal fvwm files to $HOME/.fvwm;  to simulate the old fvwm behaviour, export FVWM_USERDIR=$HOME.</li>
  <li> Instalating fvwm goodies is now to share/fvwm (FVWM_DATADIR),  not etc/fvwm.</li>
  <li> fvwm-config utility can be used for querying fvwm instalation.</li>
</ul>


<a name="2.3.16"></a>
<h4>Changes in beta release 2.3.16 (April 2000) <a href="#top">[top]</a></h4>
<ul>
  <li> Wait command supports quoted window names.</li>
  <li> Fixed the annoying rxvt text selection problem that was present  since 2.3.10.</li>
  <li> New style option BorderColorset and HilightBorderColorset.</li>
</ul>


<a name="2.3.15"></a>
<h4>Changes in beta release 2.3.15 (February 2000) <a href="#top">[top]</a></h4>
<ul>
  <li> Reduced memory usage of multiple window styles.</li>
  <li> Documented previously undocumented GotoDeskAndPage command.</li>
  <li> New parameter 'prev' for GotoDesk, GotoDeskAndPage and  MoveToDesk commands.</li>
</ul>


<a name="2.3.14"></a>
<h4>Changes in beta release 2.3.14 (February 2000) <a href="#top">[top]</a></h4>
<ul>
  <li> New style option ParentalRelativity to enable Fvwm modules to  use 'Transparent' colorsets from FvwmTheme.  'Opacity' turns it  off.</li>
  <li> The GlobalOpts command was removed in favour of individual  window styles.  Please look for GlobalOpts in the man page to  find out how to get the old functionality.</li>
  <li> The WindowshadeAnimate command was replaced with the  WindowshadeSteps window style.</li>
  <li> New MenuStyle option SelectOnRelease to better emulate Alt-Tab.  Same option for WindowList command.</li>
</ul>


<a name="2.3.13"></a>
<h4>Changes in beta release 2.3.13 (January 2000) <a href="#top">[top]</a></h4>
<ul>
  <li> New FvwmTheme option 'Transparent'.</li>
  <li> New style option 'IconFont'.</li>
  <li> New style option 'Font' replaces the old WindowFont command.</li>
</ul>


<a name="2.3.12"></a>
<h4>Changes in beta release 2.3.12 (December 1999) <a href="#top">[top]</a></h4>
<ul>
  <li> New command PointerKey. Similar to 'Key' command but binds  keystrokes to the window under the pointer instead of the window  that has the keyboard focus.</li>
  <li> New WindowList options NoOnBottom, OnBottom and OnlyOnBottom.</li>
  <li> New FvwmTheme colorset options 'Plain' and 'NoShape'.</li>
  <li> New window styles HilightFore, HilightBack and HilightColorset  replace the old commands HilightColor and HilightColorset.</li>
  <li> The ButtonStyle, TitleStyle and BorderStyle commands take effect  immediately, without a Recapture.</li>
  <li> The WindowList menu uses the WindowList menu style if it is  defined.</li>
  <li> The CursorStyle command accepts two new cursors: 'None' for no  cursor and 'Tiny' for a single pixel cursor.</li>
  <li> A new configurable script fvwm-menu-headlines to show headlines  of some popular web sites in your fvwm menus. Supported sites:  FreshMeat, LinuxToday, Slashdot, Segfault and more to come.</li>
</ul>


<a name="2.3.11"></a>
<h4>Changes in beta release 2.3.11 (December 1999) <a href="#top">[top]</a></h4>
<ul>
  <li> Sticky icon titles are drawn similar to sticky window titles.</li>
  <li> New option NoHotkeys to WindowList command.</li>
  <li> The CursorStyle command has been improved. It is now possible  to restore the default cursors.  Xpm images without a hot spot  can be used as cursors.</li>
  <li> New styles BackingStore/BackingStoreOff and SaveUnder/SaveUnderOff.</li>
  <li> Any changes in your configuration file are applied during a  restart now. (This obsoletes the contrary entry for 2.3.6.)</li>
  <li> New FvwmIconMan options: IconButton and IconColorset to control  colors for iconified windows.</li>
</ul>


<a name="2.3.10"></a>
<h4>Changes in beta release 2.3.10 (December 1999) <a href="#top">[top]</a></h4>
<ul>
  <li> Fixed build problem without shape extension.</li>
  <li> New FvwmIconBox option: FvwmIconBoxUseSkipList.</li>
  <li> New 'flat' and 'sunk' options to BorderStyle command.</li>
  <li> New commands DefaultColorset and HilightColorset.</li>
  <li> FvwmBacker is now page-aware, using a new configuration syntax.</li>
  <li> New styles TitleAtBottom and TitleAtTop.</li>
  <li> FvwmIconBox, FvwmIconMan, FvwmTaskBar and FvwmWinList support  animatation via FvwmAnimate.</li>
  <li> New command StrokeFunc to handle mouse stroke.</li>
  <li> The default root cursor, unless specified otherwise, is now left  pointer.</li>
  <li> New command BusyCursor to control a busy cursor during execution  of certain commands.</li>
  <li> CursorStyle can set the root cursor and use X11 cursor name.</li>
  <li> New command EscapeFunc to configure an aborting key sequence  (default is Ctrl-Alt-Escape).</li>
  <li> New command HideGeometryWindow to hide the size/position when  moving or resizing windows.</li>
  <li> New options for the WindowList command: UseListSkip and  OnlySkipList.</li>
  <li> New FvwmPager options SolidSeparators and NoSeparators.</li>
</ul>


<a name="2.3.9"></a>
<h4>Changes in beta release 2.3.9 (October 1999) <a href="#top">[top]</a></h4>
<ul>
  <li> Color names from colorsets can be used in fvwm command  ($[fg.cs&lt;n&gt;], $[bg.cs&lt;n&gt;], $[hilite.cs&lt;n&gt;] and  $[shadow.cs&lt;n&gt;]).</li>
  <li> FvwmScript supports colorsets.</li>
  <li> FvwmTaskBar supports colorsets with the options Colorset,  IconColorset and TipsColorset.</li>
  <li> New function variable $v.</li>
  <li> Menus can use colorsets with the new MenuStyle options  MenuColorset, ActiveColorset and GreyedColorset.</li>
</ul>


<a name="2.3.8"></a>
<h4>Changes in beta release 2.3.8 (September 1999) <a href="#top">[top]</a></h4>
<ul>
  <li> New Style options ResizeOpaque and ResizeOutline.</li>
  <li> A long-awaited new default FvwmBanner logo.</li>
  <li> RaiseTransient no longer flips main above/below already raised  transients. New style FlipTransient turns flipping back on, and  additionally does a similar job for LowerTransient at the bottom  of the layer. New style StackTransientParent augments  Raise/LowerTransient.</li>
  <li> Icons have been removed from the fvwm package and are available  at the fvwm web site.  (Temporarily only at &quot;xxx.fvwm.org&quot;  instead of &quot;www.fvwm.org&quot;.)</li>
  <li> New command BugOpts enables various former bug fixing compile  time options to be changed at run time.</li>
  <li> FvwmWharf and FvwmBacker support colorsets.</li>
  <li> A new special fvwm function StartFunction is introduced. It is  supposed to be used to start modules and for other start  commands. This function is executed before InitFunction and  RestartFunction.  Any commands currently in both the  InitFunction and RestartFuction can be moved to the new  StartFunction.</li>
</ul>


<a name="2.3.7"></a>
<h4>Changes in beta release 2.3.7 (August 1999) <a href="#top">[top]</a></h4>
<ul>
  <li> FvwmButtons and FvwmIconBox support colorsets.</li>
  <li> The old Panels feature of FvwmButtons has been removed. A  re-implementation has been written.</li>
  <li> The *FvwmButtonsButtonGeometry option makes sizing the  individual buttons very easy.</li>
  <li> FvwmAnimate accepts &quot;animate&quot; commands from other modules or  other sources of commands thru &quot;sendtomodule&quot;.</li>
  <li> More menu Shortcut keys: Tab moves down, Shift Tab moves up,  Space executes.  You can now reasonably operate the built-in  windowlist with one hand.</li>
  <li> Six new color gradients can be used in TitleStyle, BorderStyle,  ButtonStyle and MenuStyle commands (BGradient, DGradient,  SGradient, CGradient, RGradient and YGradient).</li>
  <li> MoveSmoothness command allows to tune smoothness of window  moves. Use lower values on fast machines, higher values on  slow machines.</li>
  <li> Subwindows can have a private colormap too.</li>
  <li> FvwmButtons uses variables in actions and when swallowing  applications ($left, $right, $top, $bottom, $width, $height,  $fg, $bg). See man page for details.</li>
  <li> New menu generating scripts fvwm-menu-directory,  fvwm-menu-desktop and fvwm-menu-xlock (was BuildXLockMenu).  There are man pages and --help option for all fvwm-menu scripts.</li>
  <li> Geometry (-g) command line option to FvwmButtons.</li>
  <li> *FvwmPagerSloppyFocus option: To focus a window, simply move the  pointer over the window's mini window in the pager.</li>
</ul>


<a name="2.3.6"></a>
<h4>Changes in beta release 2.3.6 (August 1999) <a href="#top">[top]</a></h4>
<ul>
  <li> New function variables $c, $r, $n.</li>
  <li> The new commands QuitSession, SaveSession, SaveQuitSession allow  to manage the session from the window manager.</li>
  <li> If you use xsm session manager, which has buggy discard command  implementation, set environment $SESSION_MANAGER_NAME to &quot;xsm&quot;.  If you use another SM, unset this variable or set to something  else.</li>
  <li> New module FvwmTheme for creating Colorsets that can be shared  with fvwm and other modules when they have been modified.</li>
  <li> If you never define an iconbox, or you fill all the iconboxes,  fvwm has a default icon box that covers the screen, it filled  top to bottom, then left to right, and has an 80x80 pixel grid.</li>
  <li> The new styles LowerTransient and DontLowerTransient allow to  control if the transients of a window are lowered when the  window itself is lowered (default) or not.</li>
  <li> The Restart function has been partially rewritten. If you were  using 'Restart' without any parameters and wonder why changes in  your configuration file are not used during a restart you should  use 'Restart --dont-preserve-state' instead.</li>
  <li> New menu styles VerticalItemSpacing and VerticalTitleSpacing  allow control over the height of menu items and titles.</li>
</ul>


<a name="2.3.5"></a>
<h4>Changes in alpha release 2.3.5 (July 1999) <a href="#top">[top]</a></h4>
<ul>
  <li> New special functions Session{Init|Restart|Exit}Function are  called instead of {Init|Restart|Exit}Function when running under  a session manager.</li>
  <li> New form for setting root cursor: FvwmForm FormFvwmRootCursor. .</li>
  <li> Fvwm web files are now in a separate CVS tree.</li>
  <li> All modules except FvwmScript and FvwmGTK share fvwm's visual.</li>
  <li> The behaviour of the Raised and Visible flags for Next,  Circulate, ... commands has been changed. They now do what their  names suggest, i.e. visible = partially visible and raised =  fully visible.</li>
  <li> The new styles RaiseTransient and DontRaiseTransient allow to  control if the transients of a window are raised when the window  itself is raised (default) or not.</li>
  <li> A new action type 'H' for 'Hold' can be assigned to complex fvwm  functions. It is triggered when the button is pressed and held  longer than ClickTime milliseconds.</li>
  <li> The activedow-button and inactive-button configure options have  been replaced with the ButtonState built in command.</li>
  <li> Most of the configure options have been removed.</li>
  <li> The cursors used for resizing and selecting windows and handling  menus have changed.</li>
</ul>


<a name="2.3.4"></a>
<h4>Changes in alpha release 2.3.4 (June 1999) <a href="#top">[top]</a></h4>
<ul>
  <li> Fvwm is GNOME compliant.</li>
  <li> Dynamic menus enhancement: The special menu item name  'MissingSubmenuFunc' alows to create submenus on the fly. See  manpage on 'AddToMenu' for details.</li>
  <li> The Restart command accepts simple shell-like syntax now.</li>
  <li> Added support for mouse strokes recognition, uses LibStroke 0.3  by Mark Willey(willey@etla.net).  (http://www.etla.net/~willey/projects/libstroke/)</li>
</ul>


<a name="2.3.3"></a>
<h4>Changes in alpha release 2.3.3 (June 1999) <a href="#top">[top]</a></h4>
<ul>
  <li> There can be two mini icons per menu label instead of one now.</li>
  <li> Menu enhancements: the layout of the menu items can be  controlled in detail with the ItemFormat option for the  MenuStyle command. The width of the borders around menus and  hilighted items can be controlled with the options BorderWidth  and Hilight3DThickness (MenuStyle). Menu behavior can be  mirrored with the SumbenusLeft option (hard to describe, it's  best to try it out). A menu item can get up to three different  labels. The first two are left aligned, the third is right  aligned by default.</li>
  <li> Colour gradients may use up to 1000 colours. The old limit was  128 colours.</li>
  <li> New command MaxWindowSize limits the initial dimensions of a  window.</li>
  <li> Include fvwmbug script for reporting bugs.</li>
  <li> New button states ToggledActiveUp, ToggledActiveDown,  ToggledInactive for customizing, as an example, the &quot;maximized&quot;  appearance of the maximize button.</li>
  <li> New button style flag MWMDecorStick to support toggle buttons  for the Stick function.</li>
  <li> New condition [!]shaded for Current and other commands taking  conditions.</li>
  <li> New menu styles HoldSubmenus/DeleteSubmenus. HoldSubmenus is the  new default for mwm and fvwm menus. When you move back from a  submenu to its parent menu the submenu remains visible.</li>
  <li> Menus can be visible multiple times at once.</li>
  <li> Restarting fvwm no longer moves the viewport to (0,0).</li>
  <li> New style DepressableBorder/FirmBorder to influence the  appearance of the window border under button presses.</li>
</ul>


<a name="2.3.2"></a>
<h4>Changes in alpha release 2.3.2 (May 1999) <a href="#top">[top]</a></h4>
<ul>
  <li> The Alt-Tab binding to invoke the window list as described in  the FAQ is  now built-in.  You can remove it as described in the  fvwm man page.</li>
  <li> The MoveThreshold command lets the user fine tune the threshold  when a click becomes a move. It works in FvwmPager too.</li>
  <li> New style IconOverride/NoIconOverride/NoActiveIconOverride to  influence the overriding behaviour of the Icon style.</li>
  <li> The FvwmCommand module is now much faster and can thus  comfortably be used in shell scripts. The tradeoff is that it  does not report errors any more. To get the old behaviour run  FvwmCommand with the '-i 1' option.</li>
  <li> Dynamic menus are provided by the special menu items  'DynamicPopupAction' and 'DynamicPopdownAction'. See the man  page on 'AddToMenu' for details.</li>
  <li> System-wide config files are now in ${sysconfdir}/fvwm  (i.e. /usr/local/etc/fvwm by default) as many files are now  installed there.</li>
</ul>


<a name="2.3.1"></a>
<h4>Changes in alpha release 2.3.1 (April 1999) <a href="#top">[top]</a></h4>
<ul>
  <li> New button style flag MWMDecorShade to support toggle buttons  for shaded windows.</li>
  <li> Daily snapshots of the development sources available on our web  page.</li>
  <li> FixedPosition style: disables moving the window.</li>
  <li> IgnoreRestack style: forbids clients to change their own  stacking order position.</li>
  <li> The NoWarp option to the Focus command for focusing window on a  different page without switching to that page.</li>
  <li> Fvwm raises icon titles when the pointer is over the icon.</li>
  <li> The cursors used for the pan frames at the edge of the screen  can be changed.</li>
  <li> StaysOnBottom style.</li>
  <li> ResizeHintOverride style: a window with this style can be  resized beyond the program supplied minimum and maximum  size. This is a hack to make fvwm cooperate with broken  applications.</li>
  <li> NeverFocus style: windows with this style never receive the  focus.</li>
  <li> New command: DefaultIcon to set the default icon.</li>
  <li> New command line arguments -visual and -visualId.</li>
  <li> GrabFocusTransient is a new style that does the same as  GrabFocus, but only for transient windows.</li>
</ul>


<a name="2.3.0"></a>
<h4>Changes in alpha release 2.3.0 (February 1999) <a href="#top">[top]</a></h4>
<ul>
  <li> FvwmPipe and FvwmConfig modules have been removed.</li>
  <li> New command: RecaptureWindow captures a single window.</li>
  <li> 'GotoDesk' command replaces former command 'Desk' (the old name  is still supported.</li>
  <li> 'Restart fvwm2' preserves almost all per-window using the file  $FVWM_USERHOME/.fvwm_restart.</li>
  <li> #define PICK_TRUECOLOR will make fvwm use the best TrueColor  #Visual.  This is for those poor unfortunates with legacy apps  #that crash if the default visual is not an 8 bit PseudoColor  #(but fortunate enough to have a 24 bit server that supports  #both 8 bit and 24 bit TrueColor)</li>
  <li> New command line argument -replace. fvwm will try to &quot;take over&quot;  from a running wm only if it is given.</li>
  <li> ImagePath and ModulePath commands now expand '+' to be the  previous value of the path.</li>
  <li> Key and mouse bindings take effect immediately. A 'Recapture'  was necessary before this change.</li>
  <li> Unmaximizing keeps windows on the same page.</li>
  <li> Maximize can now expand until some other window is found to  fully utilize available screen space.</li>
  <li> Use the 'GrabFocusOff' style to prevent ClickToFocus windows  taking the focus from other ClickToFocus windows when they are  mapped the first time. The opposite option is called 'GrabFocus'  and can be used in conjunction with MouseFocus and SloppyFocus  too.</li>
  <li> New command IgnoreModifiers for ignoring the pesky num-lock key  with key and mouse bindings.  Hint: try this command with  XFree86:    IgnoreModifiers L25  If you encounter performance problems please consult the manpage  and the FAQ.</li>
  <li> Enhancements to MoveToPage and GotoPage: 'prev' option to refer  to the last visited page, negative numbers refer to lower/right  page, suffix 'p' indicates page number relative to current  page.</li>
  <li> Mailcheck interval option for FvwmTaskBar.</li>
  <li> Colorlimit command does nothing if display depth is greater than  20. This helps if you want to use the same configuration on more  than one display depth.  ColorLimit defaults to ON if display  depth is 8 bits or less.  This should help new users.</li>
  <li> Maximize can now expand until some other window is found to  fully utilize available screen space.</li>
  <li> FvwmWinList option *FvwmWinListFollowWindowList to display the  order that fvwm keeps windows in. You can now see the order that  Next/Prev will take, Prev goes down the list, Next goes up (from  the bottom).</li>
  <li> WindowID command now takes conditions like Current.</li>
  <li> Improved cursor support: CursorStyle now supports changing  cursor colors and creating cursors from xpm files.</li>
  <li> New style options: StartsLowered, StartsRaised.</li>
  <li> New function PlaceAgain: moves a window to where it would be  placed.</li>
  <li> New module FvwmGtk. It implements menus, dialogs and  window-lists using the GTK toolkit.</li>
  <li> NoInset is independent from HiddenHandles, it now works on  NoHandles style windows.</li>
  <li> Made FvwmPager a bit simpler. Added -transient options to bind a  transient pager to mouse buttons (see FvwmPager man page for an  example).</li>
  <li> VMS port; see vms/README for details.</li>
  <li> New MenuStyle options: PopupAsRootmenu, PopupAsSubmenu</li>
  <li> The 'extras' directory has been merged into 'modules'; the  --enable-extras configure flag is obsolete.</li>
  <li> New command: Silent. Suppresses user interaction when a window  is needed but none is selected.</li>
  <li> New utility xselection which can be used with PipeRead to feed  the content of the X Selection as commands to fvwm.</li>
  <li> Fvwm can now &quot;take over&quot; from a running (ICCCM 2 compliant) wm.</li>
  <li> FvwmPager can now handle pixmaps as desk backgrounds.</li>
  <li> Layer information is displayed in WindowList.</li>
  <li> Animated window shading.</li>
  <li> Shaded windows can be resized.</li>
  <li> Windows can be shaded and maximized.</li>
  <li> Fonts and colors are no longer hard-coded on the FvwmAnimate  customization form.  FvwmForm can set defaults that the  FvwmAnimate form will use.</li>
  <li> New commands All and Pick.</li>
  <li> New command XORPixmap for increased visibility of the rubber  band lines and general spangly-ness.</li>
  <li> New start up sequence: all start up scripts etc. are read before  the initial capture so windows styles will be correct, no need  for a recapture.</li>
  <li> EdgeThickness can resize/hide/show panframes in mid function.</li>
  <li> Support for transparent Eterms etc. during opaque/animated  moves.</li>
  <li> FvwmPager tracks windows during opaque/animated moves.</li>
  <li> Session management. Fvwm talks to a session manager  and saves and restores its state.</li>
  <li> Layers. New commands Layer, DefaultLayers; new Style option,  WindowList option and condition Layer.</li>
  <li> Lots of changes to FvwmForm:  No limits of form size.  Fonts and colors can change anywhere in the form.  Form appearance can be configured globaly:    Form defaults are read from .FvwmForm.    There is a built in Default setting/saving dialogue.  Forms can be read in directly from a file.  Some forms are installed automatically.  Tab to previous field.  You can control vertical spacing on text so spacing is OK for  help panels. A button can execute a synchronous shell command.  You can paste into a form  Forms can read configuration data.</li>
  <li> IconPath and PixmapPath are replaced by single ImagePath. All  images, no matter what their format are searched for along the  ImagePath.</li>
</ul>


<a name="2.2.5"></a>
<h4>Changes in official release 2.2.5 (February 2001) <a href="#top">[top]</a></h4>
<ul>
  <li> When fvwm is run remotely, startup is noticably faster.</li>
  <li> Fixed the description of Focus in the man page.</li>
  <li> Fixed a compile problem with Slackware 7.1.</li>
  <li> Security fix related to .fvwm2rc being searched in the current  directory when $HOME is not set.</li>
  <li> A small fix in the code for SmartPlacement.</li>
  <li> Core dump fix in pixmap code.</li>
</ul>


<a name="2.2.4"></a>
<h4>Changes in official release 2.2.4 (November 1999) <a href="#top">[top]</a></h4>
<ul>
  <li> Fixed HP-UX 10.20 build problems.</li>
  <li> Fixed build problems without shape extension.</li>
</ul>


<a name="2.2.3"></a>
<h4>Changes in official release 2.2.3 (October 1999) <a href="#top">[top]</a></h4>
<ul>
  <li> Several minor bugfixes.</li>
  <li> Fixed dragging windows out of the pager.</li>
  <li> Added support for StartFunction &amp; ImagePath not to break new  configurations.</li>
  <li> Fixed long-window-name-hangs-X bug.</li>
</ul>


<a name="2.2.2"></a>
<h4>Changes in official release 2.2.2 (May 1999) <a href="#top">[top]</a></h4>
<ul>
  <li> New &quot;Emulate&quot; command for independent control of the  move/resize feedback window.</li>
  <li> EdgeThickness command can be issued at any time.</li>
  <li> Pan frames not created when not needed.</li>
  <li> Pan frames reach corners.</li>
  <li> Fixed window wandering on restart, recapture.</li>
  <li> International characters are accepted as input in FvwmForm.</li>
  <li> Fix bug in window shading that left one row of pixels visible.</li>
  <li> Fix to FvwmTaskbar so that it won't loop when there are too  many buttons.</li>
  <li> Fix positioning bug on overlapping menus.</li>
  <li> Fix M4 command problem, Problem Reports 201 and 246.</li>
  <li> Fixed bug when calling a function without all args supplied.</li>
  <li> Miscellaneous bug fixes, see ChangeLog for details.</li>
</ul>


<a name="2.2.2"></a>
<h4>Changes in official release 2.2 (February 1999) <a href="#top">[top]</a></h4>
<?php decoration_window_end(); ?>
