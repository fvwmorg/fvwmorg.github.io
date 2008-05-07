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
if (strlen("$navigation_check") == 0) include_once($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - NEWS";
$link_name      = "News";
$link_picture   = "pictures/icons/news";
$parent_site    = "top";
$child_sites    = array("logo_competition", "logo");
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
  include_once(sec_filename("$layout_file"));
  exit();
}

decoration_window_start("Latest News");

?>

<h4>Selection by release:</h4>
<center>
<table border="0" width="100%" cellspacing="2" summary="">
<tr>
<td><a href="#2.5.26" style="font-weight:normal;">&nbsp;2.5.26&nbsp;</a></td>
<td><a href="#2.5.25" style="font-weight:normal;">&nbsp;2.5.25&nbsp;</a></td>
<td><a href="#2.5.24" style="font-weight:normal;">&nbsp;2.5.24&nbsp;</a></td>
<td><a href="#2.5.23" style="font-weight:normal;">&nbsp;2.5.23&nbsp;</a></td>
<td><a href="#2.5.22" style="font-weight:normal;">&nbsp;2.5.22&nbsp;</a></td>
<td><a href="#2.5.21" style="font-weight:normal;">&nbsp;2.5.21&nbsp;</a></td>
<td><a href="#2.5.20" style="font-weight:normal;">&nbsp;2.5.20&nbsp;</a></td>
<td><a href="#2.5.19" style="font-weight:normal;">&nbsp;2.5.19&nbsp;</a></td>
<td><a href="#2.5.18" style="font-weight:normal;">&nbsp;2.5.18&nbsp;</a></td>
</tr>
<tr>
<td><a href="#2.5.17" style="font-weight:normal;">&nbsp;2.5.17&nbsp;</a></td>
<td><a href="#2.5.16" style="font-weight:normal;">&nbsp;2.5.16&nbsp;</a></td>
<td><a href="#2.5.15" style="font-weight:normal;">&nbsp;2.5.15&nbsp;</a></td>
<td><a href="#2.5.14" style="font-weight:normal;">&nbsp;2.5.14&nbsp;</a></td>
<td><a href="#2.5.13" style="font-weight:normal;">&nbsp;2.5.13&nbsp;</a></td>
<td><a href="#2.5.12" style="font-weight:normal;">&nbsp;2.5.12&nbsp;</a></td>
<td><a href="#2.5.11" style="font-weight:normal;">&nbsp;2.5.11&nbsp;</a></td>
<td><a href="#2.5.10" style="font-weight:normal;">&nbsp;2.5.10&nbsp;</a></td>
<td><a href="#2.5.9" style="font-weight:normal;">&nbsp;2.5.9&nbsp;</a></td>
</tr>
<tr>
<td><a href="#2.5.8" style="font-weight:normal;">&nbsp;2.5.8&nbsp;</a></td>
<td><a href="#2.5.7" style="font-weight:normal;">&nbsp;2.5.7&nbsp;</a></td>
<td><a href="#2.5.6" style="font-weight:normal;">&nbsp;2.5.6&nbsp;</a></td>
<td><a href="#2.5.5" style="font-weight:normal;">&nbsp;2.5.5&nbsp;</a></td>
<td><a href="#2.5.4" style="font-weight:normal;">&nbsp;2.5.4&nbsp;</a></td>
<td><a href="#2.5.3" style="font-weight:normal;">&nbsp;2.5.3&nbsp;</a></td>
<td><a href="#2.5.2" style="font-weight:normal;">&nbsp;2.5.2&nbsp;</a></td>
<td><a href="#2.5.1" style="font-weight:normal;">&nbsp;2.5.1&nbsp;</a></td>
<td><a href="#2.5.0" style="font-weight:normal;">&nbsp;2.5.0&nbsp;</a></td>
</tr>
<tr>
<td><a href="#2.4.20" style="font-weight:normal;">&nbsp;2.4.20&nbsp;</a></td>
<td><a href="#2.4.19" style="font-weight:normal;">&nbsp;2.4.19&nbsp;</a></td>
<td><a href="#2.4.18" style="font-weight:normal;">&nbsp;2.4.18&nbsp;</a></td>
<td><a href="#2.4.17" style="font-weight:normal;">&nbsp;2.4.17&nbsp;</a></td>
<td><a href="#2.4.16" style="font-weight:normal;">&nbsp;2.4.16&nbsp;</a></td>
<td><a href="#2.4.15" style="font-weight:normal;">&nbsp;2.4.15&nbsp;</a></td>
<td><a href="#2.4.14" style="font-weight:normal;">&nbsp;2.4.14&nbsp;</a></td>
<td><a href="#2.4.13" style="font-weight:normal;">&nbsp;2.4.13&nbsp;</a></td>
<td><a href="#2.4.12" style="font-weight:normal;">&nbsp;2.4.12&nbsp;</a></td>
</tr>
<tr>
<td><a href="#2.4.11" style="font-weight:normal;">&nbsp;2.4.11&nbsp;</a></td>
<td><a href="#2.4.10" style="font-weight:normal;">&nbsp;2.4.10&nbsp;</a></td>
<td><a href="#2.4.9" style="font-weight:normal;">&nbsp;2.4.9&nbsp;</a></td>
<td><a href="#2.4.8" style="font-weight:normal;">&nbsp;2.4.8&nbsp;</a></td>
<td><a href="#2.4.7" style="font-weight:normal;">&nbsp;2.4.7&nbsp;</a></td>
<td><a href="#2.4.6" style="font-weight:normal;">&nbsp;2.4.6&nbsp;</a></td>
<td><a href="#2.4.5" style="font-weight:normal;">&nbsp;2.4.5&nbsp;</a></td>
<td><a href="#2.4.4" style="font-weight:normal;">&nbsp;2.4.4&nbsp;</a></td>
<td><a href="#2.4.3" style="font-weight:normal;">&nbsp;2.4.3&nbsp;</a></td>
</tr>
<tr>
<td><a href="#2.4.2" style="font-weight:normal;">&nbsp;2.4.2&nbsp;</a></td>
<td><a href="#2.4.1" style="font-weight:normal;">&nbsp;2.4.1&nbsp;</a></td>
<td><a href="#2.4.0" style="font-weight:normal;">&nbsp;2.4.0&nbsp;</a></td>
</tr>
</table>
</center>
<a name="2.5.27"></a>
<h4>Changes in beta release 2.5.27 (not released yet) <a href="#top">[top]</a></h4>
<a name="2.5.26"></a>
<h4>Changes in beta release 2.5.26 (7-May-2008) <a href="#top">[top]</a></h4>
<ul>
  <li> New features:</li>
  <li> New MenuStyle option VerticalMargins.</li>
  <li> New module features:</li>
  <li> FvwmButtons: New button alignment option: top.</li>
  <li> Bug fixes:</li>
  <li> Fixed crash in ARGB visual detection code.</li>
  <li> Fixed compilation without XRender support.</li>
  <li> Fixed drawing of background pictures in menu items and titles.</li>
  <li> Fixed hadling of shaped windows.</li>
  <li> Fixed a 64-bit bug in the EWMH code.</li>
</ul>


<a name="2.5.25"></a>
<h4>Changes in beta release 2.5.25 (26-Feb-2008) <a href="#top">[top]</a></h4>
<ul>
  <li> New features:</li>
  <li> Handle the STATE_ADD command of the EWMH _NET_WM_STATE     message from version 1.3 of the EWMH spec.</li>
  <li> Support transparency in ARGB windows</li>
  <li> Bug Fixes:</li>
  <li> Fixed problem with windows disappearing when created     unless the style Unmanaged was used.</li>
  <li> Edge move delay was used as resistance for the top edge.</li>
  <li> Fixed a parsing problem of the screen argument of the     SnapAttraction style.</li>
  <li> Some html documentation files were not installed.</li>
  <li> Fixed a memory leak in internationalized font handling.</li>
  <li> Fixed a bug in MinOverlap placement.</li>
  <li> Fixed the StickyAcrossPages style in the FvwmPager.</li>
  <li> Fixed the determination of the X charset on UTF-8 systems.</li>
  <li> Fixed a crash when certain EWMH messages were sent to     unmanaged windows.</li>
  <li> Fixed a memory leak in multibyte codepage code.</li>
  <li> Ignore the EWMH staysontop and staysonbottom hints if the     EWMHIgnoreStackingOrderHints style is used.</li>
  <li> Fixed a sporadic crash when the root background set by gnome,     fvwm-root, esetroot etc. changes and a root transparent     colour set is used.</li>
  <li> Fixed spradic crash in modules with root transparent     background from colour sets.</li>
  <li> Fixed a possible crash if the last active module fails.</li>
</ul>


<a name="2.5.24"></a>
<h4>Changes in beta release 2.5.24 (24-Nov-2007) <a href="#top">[top]</a></h4>
<ul>
  <li> New features:</li>
  <li> Disabled paging during interactive resize operations by     default (see 2.5.20) as it is annoying to many people.</li>
  <li> New style command options:       EdgeMoveResistance
    <ul>
        <li>       EdgeMoveDelay</li>
        <li>       EdgeResizeDelay</li>
        <li>       SnapGrid</li>
        <li>       SnapAttraction</li>
    </ul>
       that replace the now obsolete commands EdgeResistance,     SnapGrid and SnapAttraction.  The EdgeResistance command has     a new syntax with only one argument.</li>
  <li> New command MenuCloseAndExec for menu bindinngs that can be     used to trigger certain commands from a menu without an     associated item.  For example, with
    <ul>
        <li>       Key F1 MTI[]-_ A MenuCloseAndExec Menu RootMenu</li>
    </ul>
       the RootMenu can be opened from any other menu by pressing     F1.</li>
  <li> Bug Fixes:</li>
  <li> Sometimes a window jumped by half the screen's size when     moving with the mouse and hitting the border of the desktop.</li>
  <li> Fixed the &quot;screen w&quot; argument of the Move and other commands.</li>
  <li> Clicking on a menu title did not close the menu by default.</li>
  <li> Temporary files in FvwmPerl overwrote each other.</li>
</ul>


<a name="2.5.23"></a>
<h4>Changes in beta release 2.5.23 (1-Sep-2007) <a href="#top">[top]</a></h4>
<ul>
  <li> New features:</li>
  <li> New Style command options:       StartShaded</li>
  <li> Bug Fixes:</li>
  <li> Fixed FvwmButton's button placement algorithm broken in     2.5.22.</li>
</ul>


<a name="2.5.22"></a>
<h4>Changes in beta release 2.5.22 (29-Aug-2007) <a href="#top">[top]</a></h4>
<ul>
  <li> New features:</li>
  <li> New Style command options:       UnderMousePlacementHonorsStartsOnPage
    <ul>
        <li>       UnderMousePlacementIgnoresStartsOnPage</li>
        <li>       !MinOverlapPlacementPenalties</li>
        <li>       !MinOverlapPercentPlacementPenalties</li>
        <li>       MinWindowSize</li>
    </ul>
  </li>
  <li> SVG (scalable vector graphics) image loading support.</li>
  <li> New extended variables       $[w.iconfile.svgopts]
    <ul>
        <li>       $[w.miniiconfile.svgopts].</li>
    </ul>
  </li>
  <li> Added suffix 'w' to the arguments of the Move command and     similar.  It is now possible to add multiple shifts to a     window position, e.g. &quot;50-50w 50-50w&quot; for the center of the     screen.</li>
  <li> Removed UnderMousePlacement and CenterPlacement. Use     &quot;PositionPlacement Center&quot; and &quot;PositionPlacement UnderMouse&quot;     instead.</li>
  <li> Documentation in HTML format.</li>
  <li> Replaced &quot;UseListSkip&quot; with &quot;UseSkipList&quot; &amp; &quot;OnlyListSkip&quot; with     &quot;OnlySkipList&quot; in WindowList command. (Old options deprecated.)</li>
  <li> New subject ImageCache for PrintInfo command.</li>
  <li> The new commad EchoFuncDefinition prints a function's     definition to the console for debugging purposes.</li>
  <li> The CursorStyle command can now load PNG and SVG images as     mouse cursors.  New x and y arguments to specify the     hot spot.  Also, it is now possible to load non-monochrome     cursors and cursors with partial transparency.</li>
  <li> New module features:</li>
  <li> FvwmScript: New instructions: ChangeWindowTitle and     ChangeWindowTitleFromArg.</li>
  <li> Bug Fixes:</li>
  <li> Windows with aspect ratio no longer maximize past the screen     edges.</li>
  <li> Fixed CenterPlacement with Xinerama screens.</li>
  <li> Fixed CascadePlacement with title direction west and east</li>
  <li> Windows no longer unstick when going to fullscreen mode.</li>
  <li> Fixed crash when raising/lowering a destroyed window.</li>
  <li> Fixed expansion of $[n-] and $[*], broken in 2.5.20.</li>
  <li> Fixes for resizing shaded windows and windows with a gravity     other than northwest.</li>
  <li> Fixed CursorStyle POSITION, broken since 2.3.24.</li>
  <li> The hi, sh and fgsh colors in colorsets are no longer replaced     by computed values if not explicit set on the same line as the     bg, or for fgsh fg, changes. (bug #3359)</li>
  <li> FvwmButtons now redraws stretched button backgrounds correctly     on partial expose.</li>
  <li> Windows with circular transient for hints may no longer crash     fvwm with StackTransientParent style.</li>
  <li> FvwmPager now displays windows that are StickyAcrossPages     correctly.</li>
  <li> Fixed a possible crash with modules closing down.</li>
  <li> Fixed broken demo script fvwm_make_browse_menu.sh.</li>
  <li> The conditon following a comma separator without whitespace     padding was previously ignored if the presiding condition was     multi-worded.</li>
  <li> Various FvwmButtons drawing problems.</li>
  <li> Window movement or resizing triggered by an EWMH message now     honours the FixedSize and FixedPosition window styles.</li>
  <li> Properly generate leave_window and enter_window events for     the root window in FvwmEvent.</li>
  <li> Fixed crash in UTF8 code.</li>
  <li> Fixed parsing of the PropertyChange command.</li>
  <li> Fixed windowlist crash when combining CurrentAtEnd with     IconifiedAtEnd and all windows are iconified.</li>
</ul>


<a name="2.5.21"></a>
<h4>Changes in beta release 2.5.21 (20-Jan-2007) <a href="#top">[top]</a></h4>
<ul>
  <li> New features:</li>
  <li> The command Scroll can now be used for interactive scrolling.</li>
  <li> Bug Fixes:</li>
  <li> Fixed Tile...Placement styles (SmartPlacement) that were     broken in 2.5.20.</li>
</ul>


<a name="2.5.20"></a>
<h4>Changes in beta release 2.5.20 (15-Jan-2007) <a href="#top">[top]</a></h4>
<ul>
  <li> New features:</li>
  <li> New Style options: StippledIconTitle, !StickyStippledTitle,     and !StickyStippledIconTitle.</li>
  <li> Full support for menu context (M) key and mouse bindings. See     the section Menu Bindings in the man page for details.</li>
  <li> Hilighted menu backgrounds now use pixmaps gradients and     transparency from their related colorset.</li>
  <li> New window conditions: StickyIcon, StickyAcrossPagesIcon and     StickyAcrossDesksIcon.</li>
  <li> Changed features:</li>
  <li> &quot;Mouse n M N&quot; is no longer used to disable or remap the      builtin tear off menu button. See the section Tear Off Menus
    <ul>
        <li>      for details on replacement commands.</li>
    </ul>
  </li>
  <li> Bug Fixes:</li>
  <li> FvwmWinList: fix problem with window name/button mixups during     Init/Restart of fvwm. (bug #1393)</li>
  <li> It is now possible to switch the viewport while resizing     windows if &quot;EdgeScroll 0 0&quot; is set.</li>
  <li> Fixed disappearing windows when aborting interactive resizing     of maximized windows when unmaximizing them later.</li>
  <li> Fixed disappearing windows when moving maximized windows and     unmaximizing them later.</li>
  <li> Fixed calculation of final location with MoveToPage and     MoveToScreen with windows to the left or top of the viewport.</li>
  <li> 64-bit architecture fix in FvwmProxy.</li>
  <li> FvwmForm now work with balanced quoted command for Timeout.</li>
  <li> FvwmPager correctly updates on window desk change.</li>
  <li> FvwmIconBox: fixed problem with IconColorset's background     color change not being applied immediately.</li>
  <li> Allow FvwmConsole to run a terminal via rxvtc or urxvtc.     FvwmConsole dies if no client connects within one minute.</li>
  <li> Expansion of variables in FvwmTaskBar launch button commands     fixed.</li>
  <li> Fixed a race condition with applications raising their own     transient windows in certain ways. (Apple Shake, kphotoalbum)</li>
  <li> FvwmIdent reports the correct geometry if the window has its     title at the left or right side.</li>
  <li> Fixed an infinite loop when deiconifying windows in a group     via a different window than the initially iconified.</li>
</ul>


<a name="2.5.19"></a>
<h4>Changes in beta release 2.5.19 (9-Dec-2006) <a href="#top">[top]</a></h4>
<ul>
  <li> Bug Fixes:</li>
  <li> FvwmCommand now reports &quot;end windowlist&quot; and &quot;end configinfo&quot;.</li>
  <li> FvwmCommand now prints config info split on lines.</li>
  <li> FvwmTaskBar no longer gets lost with trailing whitespace after     geometry specification.</li>
  <li> Fixed a window size problem if the aspect ratio is set (e.g.     mplayer).</li>
  <li> Decorations now update when unmanaged windows take focus, and     not FlickeringQtDialogsWorkaround is enabled.</li>
  <li> FvwmPager again allows movement of windows added before a     page change.</li>
  <li> fvwm no longer crashes on 1 and 4 bit displays. (#1677)</li>
  <li> EWMH desktops now correctly handles FPClickToFocus. (#1492)</li>
  <li> Security fix in fvwm-menu-directory. (CVE-2006-5969)</li>
</ul>


<a name="2.5.18"></a>
<h4>Changes in beta release 2.5.18 (11-Sep-2006) <a href="#top">[top]</a></h4>
<ul>
  <li> Bug Fixes:</li>
  <li> If a window started fullscreen, leaving fullscreen state now     properly unmaximizes and resizes the window.</li>
  <li> Fixed the ForeColor/HilightFore styles that were broken in     2.5.17.</li>
  <li> FvwmPager can now move icons with the !IconTitle style.</li>
  <li> Fixed drawing of icons that are moved to a different desk.</li>
  <li> FvwmPager no longer tries to move non-movable windows.</li>
  <li> FvwmPager now moves all windows as user requests.</li>
  <li> FvwmPager no longer displaces windows with title and border     sizes on moves.</li>
  <li> TestRc now correctly matches Break, and $[cond.rc] is     expanded for Break.</li>
  <li> Fixed several 64-bit architecture problems with     XGetWindowProperty().  Xine works much better on 64-bit     machines.</li>
  <li> Fixed handling of ClickToFocusPassesClick with the EWMH     desktop (e.g. using nautilus).</li>
  <li> Fixed handling of windows that are unmapped and mapped again     too fast (e.g. fpga_editor).</li>
</ul>


<a name="2.5.17"></a>
<h4>Changes in beta release 2.5.17 (19-Jul-2006) <a href="#top">[top]</a></h4>
<ul>
  <li> New features:</li>
  <li> New MenuStyle options TitleFont, TitleColorset and     HilightTitleBack.</li>
  <li> New command PressButton in module FvwmButtons for being able     to emulate button press via other means than the mouse.</li>
  <li> New wrap options to EdgeScroll command for wrapping with pixel     distances.</li>
  <li> New Style option UnderMousePlacement.</li>
  <li> Unused arguments to Style options generate warnings.</li>
  <li> The name style names match against can be augmented by the     X-resource &quot;fvwmstyle&quot;.</li>
  <li> New options, Reverse and UseStack, to All command.</li>
  <li> WindowShade can now reshade windows using the Last direction.</li>
  <li> Positional parameters to complex functions can now be expanded     using $[n], $[n-m], $[n-] and $[*] expressions.</li>
  <li> The width and height arguments of the Resize command now     accept the prefix 'w' to allow resizing relative to the     current window size.</li>
  <li> New command ModuleListenOnly.</li>
  <li> New &quot;Periodic&quot; option added to Schedule command.</li>
  <li> Bug Fixes:</li>
  <li> Fixed detection of running non-ICCCM2 wm (bug #3151).</li>
  <li> Fixed drawing of menus with the sidepic on the right.</li>
  <li> EdgeScroll no longer divides pixel distances &gt;1000 by 1000.     (bug #3162)</li>
  <li> The configure script can now cope with four-part version     numbers when detecting some libraries.</li>
  <li> The WarpToWindow command followed by Move in a complex     function now uses the correct pointer position.</li>
  <li> The menu style TitleWarp does no longer warp the pointer for     root menus (as it is documented).</li>
  <li> Fixed detection of safe system version of mkstemp.</li>
  <li> Fixed the conditions Iconifiable, Fixed, FixedSize,     Maximizable and Closable.</li>
  <li> Fixed problem with window outline and placement position     running out of sync.</li>
  <li> FvwmConsole no longer conflicts with Cygwin stdio (bug #3772).</li>
  <li> FvwmGtk now configures correctly on Cygwin (bug #3772).</li>
  <li> Fixed tempfile vulnerabilities in FvwmCommand.</li>
</ul>


<a name="2.5.16"></a>
<h4>Changes in beta release 2.5.16 (20-Jan-2006) <a href="#top">[top]</a></h4>
<ul>
  <li> New features:</li>
  <li> If the pointer can not be grabbed in functions, a message is     printed to the console instead of beeping.</li>
  <li> Bug Fixes:</li>
  <li> Fixed a couple of build problems introduced in 2.5.15.</li>
</ul>


<a name="2.5.15"></a>
<h4>Changes in beta release 2.5.15 (14-Jan-2006) <a href="#top">[top]</a></h4>
<ul>
  <li> New features:</li>
  <li> Variables can be nested, like $[desk.name$[desk.n]].</li>
  <li> Obsolete one-letter variables work, but generate warnings now.</li>
  <li> Windows can be placed by any button (now also &gt;3).</li>
  <li> It is now possible to redefine the buttons usable to finish     window movement and manual placement.</li>
  <li> New window condition PlacedByButton.</li>
  <li> MenuStyle pairs can be negated by prefixing '!'.</li>
  <li> New generic tabbing module - FvwmTabs.</li>
  <li> New Style option: EWMHIgnoreWindowType.</li>
  <li> New MenuStyle options: MouseWheel, ScrollOffPage and     TrianglesUseFore.</li>
  <li> To compile from CVS, autoconf-2.53 or above is now required.     This does not affect compiling the released tarballs.</li>
  <li> New option &quot;screen&quot; to Move and ResizeMove commands to allow     specifying the target Xinerama screen.</li>
  <li> Bug Fixes:</li>
  <li> Supported a new fribidi version 0.10.5 in addition to 0.10.4.</li>
  <li> Better look for windows with &quot;BorderStyle TiledPixmap&quot;.</li>
  <li> Some EWMH-related 64-bit fixes.</li>
  <li> Fixed segmentation fault when replacing title of title only     menus (Bug #1121).</li>
  <li> Fixes for resizing of shaded windows and resizing/moving     windows with complex functions.</li>
</ul>


<a name="2.5.14"></a>
<h4>Changes in beta release 2.5.14 (24-Aug-2005) <a href="#top">[top]</a></h4>
<ul>
  <li> New features:</li>
  <li> Fvwm now officially supports 64-bit architectures.</li>
  <li> New Test conditions EnvIsSet, EnvMatch, EdgeHasPointer and     EdgeIsActive.</li>
  <li> New window condition FixedPosition.</li>
  <li> New module features:</li>
  <li> FvwmPerl module supports window context when preprocessing.</li>
  <li> FvwmPerl module accepts new --export option that by default     defines two fvwm functions &quot;Eval&quot; and &quot;.&quot;, to be used like:
    <ul>
        <li>       FvwmPerl -x</li>
        <li>       Eval $a = $[desk.n] - 2; cmd(&quot;GotoDesk 0 $a&quot;) if $a &gt;= 0</li>
        <li>       . Exec xmessage %{2 + cos(0)}%    # embedded calculator</li>
    </ul>
  </li>
  <li> New FvwmProxy option ProxyIconified.</li>
  <li> New FvwmTaskBar option Pad to control the gap between     buttons.</li>
  <li> Bug Fixes:</li>
  <li> Fixed a Solaris compiler error introduced in 2.5.13.</li>
  <li> Fixed a hang with layers set by applications (e.g. AbiWord).</li>
  <li> GotoDesk with a relative page argument now wraps around at     the end of the given range as documented. (Bug #1396).</li>
  <li> PopupDelayed menu style option was not copied on     CopyMenuStyle.</li>
  <li> Transparent Animated menus with non-transparent popup were     not animated correctly.</li>
  <li> Supported euc-jp class of encodings.</li>
  <li> A window's default layer is no longer set to 0 during a     restart.</li>
  <li> Fixed an annoying MouseFocus/SloppyFocus problem in     conjunction with EdgeResistance + EdgeScroll (sometimes a     window did not get the focus as it should have). This     problem first occured in 2.5.11.</li>
</ul>


<a name="2.5.13"></a>
<h4>Changes in beta release 2.5.13 (16-Jul-2005) <a href="#top">[top]</a></h4>
<ul>
  <li> Bug Fixes:</li>
  <li> The MoveToPage command did not work without arguments in     2.5.11 and 2.5.12.</li>
  <li> Mouse/Key command no args possible core dump.</li>
  <li> Direction with no args possible core dump.</li>
  <li> FvwmScript periodic tasks run too often.</li>
  <li> Perl modules did not work on 64 machines.</li>
  <li> FvwmDebug did not report any extended messages.</li>
  <li> fvwm-menu-desktop supports mandriva.</li>
  <li> fvwm-menu-desktop when verifying executable, allow full path.</li>
  <li> New module features:</li>
  <li> FvwmIconMan: MaxButtonWidth and MaxButtonWidthByColumns     options.</li>
  <li> FvwmIconMan: added tool tips with Tips, TipsDelays, TipsFont,     TipsColorset, TipsFormat, TipsBorderWidth, TipsPlacement,     TipsJustification and TipsOffsets options.</li>
  <li> FvwmButtons: PressColorset &amp; ActiveColorset options for     _individual_ buttons.</li>
</ul>


<a name="2.5.12"></a>
<h4>Changes in alpha release 2.5.12 (6-Oct-2004) <a href="#top">[top]</a></h4>
<ul>
  <li> New commands:</li>
  <li> EdgeLeaveCommand</li>
  <li> New module features:</li>
  <li> FvwmIconMan: ShowOnlyFocused option.</li>
</ul>


<a name="2.5.11"></a>
<h4>Changes in alpha release 2.5.11 (30-Sep-2004) <a href="#top">[top]</a></h4>
<ul>
  <li> Multiple window names can be specified in conditions.</li>
  <li> Window-specific key/mouse bindings. (Bindings no longer have to  be global.)</li>
  <li> The default fvwm configuration files are now: ~/.fvwm/config and  $FVWM_DATADIR/config. Five previously used config file locations  are still searched as usual for backward compatibility.</li>
  <li> New extended variables $[w.desk] and $[w.layer].</li>
  <li> New options GrowOnWindowLayer and GrowOnlayers to the Maximize  command.</li>
  <li> New Style option &quot;State&quot;.</li>
  <li> New Style option &quot;CenterPlacement&quot;.</li>
  <li> New option to FvwmIconMan: ShowNoIcons.</li>
  <li> New WindowList tracker and other enhancements in Perl library.</li>
  <li> New option to fvwm-menu-directory: --func-name.</li>
  <li> Improved FvwmWindowMenu module.</li>
  <li> Fluxbox-like Alt-Button3 resizing with the new Resize options  Direction, WarpToBorder and FixedDirection</li>
  <li> Enhanced &quot;Test (Version &gt;= x.y.z)&quot; option to allow version  comparisons.</li>
  <li> New FvwmButtons options: ActiveColorset, ActiveIcon, ActiveTitle,  PressColorset, PressIcon and PressTitle.</li>
  <li> New FvwmButtons swallow option: SwallowNew.</li>
  <li> The option CurrentGlobalPageAnyDesk was accidentally named  CurrentGlobbalPageAnyDesk before.</li>
  <li> New conditions AnyScreen and Overlapped.</li>
  <li> The Read and PipeRead commands return 1 if the file or command  could be read or executed and -1 otherwise.</li>
  <li> New menu option TearOffImmediately.</li>
  <li> Added support for Solaris' Xinerama.</li>
  <li> New option MailDir in FvwmTaskBar.</li>
  <li> MoveToPage command:
    <ul>
        <li>    New options wrapx, wrapy, nodesklimitx and nodesklimity.</li>
        <li>    New suffix 'w' to allow for window relative movement.</li>
    </ul>
  </li>
</ul>


<a name="2.5.10"></a>
<h4>Changes in alpha release 2.5.10 (19-Mar-2004) <a href="#top">[top]</a></h4>
<ul>
  <li> New command FakeKeyPress.</li>
  <li> New BugOpts option ExplainWindowPlacement.</li>
  <li> Adjustable button reliefs in FvwmIconMan (option ReliefThickness).</li>
  <li> Security patch in fvwm-bug.  See http://securitytracker.com/alerts/2004/Jan/1008781.html</li>
  <li> Security fixes in:
    <ul>
        <li>    fvwm-menu-directory (BugTraq id 9161)</li>
        <li>    fvwm_make_directory_menu.sh</li>
        <li>    fvwm_make_browse_menu.sh</li>
    </ul>
  </li>
</ul>


<a name="2.5.9"></a>
<h4>Changes in alpha release 2.5.9 (2-Mar-2004) <a href="#top">[top]</a></h4>
<ul>
  <li> New MenuStyle options PopupIgnore and PopupClose.</li>
  <li> New configure option --disable-iconv to disable iconv support.</li>
  <li> New extended variables $[w.iconfile] and $[w.miniiconfile].</li>
  <li> New Style option Unmanaged. Such windows are not managed by  fvwm.</li>
  <li> New binding context 'U' for unmanaged windows, similar to 'R'oot.</li>
  <li> New option DisplayNewWindowNames to the BugOpts command.</li>
  <li> Security fix for fvwm-menu-directory.  See BugTraq id 9161.</li>
</ul>


<a name="2.5.8"></a>
<h4>Changes in development release 2.5.8 (31-Oct-2003) <a href="#top">[top]</a></h4>
<ul>
  <li> New prefix command KeepRc.</li>
  <li> Renamed the Cond command to TestRc, and the On command to Test.  Removed the CondCase command.  Use &quot;KeepRc TestRc&quot; instead.</li>
  <li> The Break command can be told the number of nested function  levels to break out of.  Break now has a return code of -2  (&quot;Break&quot;).</li>
  <li> Directions can be abbreviated with -, _, [, ], &lt;, &gt;, v or ^ like  in key or mouse bindings.</li>
  <li> New extended variable $[func.context].</li>
  <li> New Style option MoveByProgramMethod. Tries to autodetect  whether application windows are moved honouring the ICCCM or not  (default).  The method can be overridden manually if the  detection does not work.</li>
  <li> fvwm supports tear off menus. See the &quot;Tear Off Menus&quot; section  in the man page or press Backspace on any menu to try them out.</li>
  <li> fvwm now handles what Unicode calls &quot;combining characters&quot; (i.e.  marks drawn on top of other characters).</li>
  <li> New commands WindowStyle and DestroyWindowStyle for individual  (per window) styles.</li>
  <li> The conditions !Current... and !Layer now work as expected.</li>
  <li> Added a nice autohide script to the FAQ.</li>
  <li> FvwmAnimate now supports dynamical commands &quot;pause&quot;, &quot;play&quot;,  &quot;push&quot;, &quot;pop&quot; and &quot;reset&quot; to manipulate the playing state.</li>
</ul>


<a name="2.5.7"></a>
<h4>Changes in development release 2.5.7 (30-May-2003) <a href="#top">[top]</a></h4>
<ul>
  <li> The commands Cond and CondCase now support checking for  inequality by prefixing the return code with '!'.</li>
  <li> Schedule and Deschedule support hexadecimal and octal command  ids.</li>
  <li> In FvwmIconMan, windows can move from one manager to another  according to the managers' Resolution options.</li>
  <li> In order to fix a problem with StartsOnScreen and applications  that set a user specified position hint, the StartsOnScreen style  no longer works for the following modules:  FvwmBanner,  FvwmButtons, FvwmDragWell, FvwmIconBox, FvwmIconMan, FvwmIdent,  FvwmPager, FvwmScroll, FvwmTaskBar, FvwmWharf, FvwmWinList.  Use  the '@&lt;screen&gt;' bit in the module geometry specification where  applicable.</li>
  <li> Documented variable $[gt.any_string] and LocalePath command  (new in 2.5.5).</li>
  <li> Added gettext support to FvwmScript. New head instruction  UseGettext and WindowLocaleTitle. New widget instruction  LocaleTitle. New instruction ChangeLocaleTitle and new function  Gettext.</li>
  <li> WindowListFunc is executed now within a window context, so  a prefix &quot;WindowId $0&quot; is not needed in its definition anymore,  and it is advised to remove it in user configs.</li>
  <li> FvwmEvent now executes all window related events within a window  context, so PassId is not needed anymore, and all prefixes  &quot;WindowId $0&quot; may be removed in user event handlers.</li>
  <li> New FvwmTaskBar option NoDefaultStartButton.</li>
</ul>


<a name="2.5.6"></a>
<h4>Changes in development release 2.5.6 (28-Feb-2003) <a href="#top">[top]</a></h4>
<ul>
  <li> Fix button 3 drag in FvwmPager so that drag follows the mouse.</li>
  <li> Fix for gmplayer launched by fvwm. Close stdin on Exec so the  exec'd process knows it's not running interactively.</li>
  <li> Improvement in MultiPixmap. In particular Colorset and Solid  color can be specified.</li>
  <li> New ButtonStyle and TitleStyle style options AdjustedPixmap,  StretchedPixmap and ShrunkPixmap.</li>
  <li> Use the MIT Shared Memory Extension for XImage.</li>
  <li> The TitleStyle decor of a vertical window Title is rotated.  This is controllable using a new style option:
    <ul>
        <li>    !UseTitleDecorRotation / UseTitleDecorRotation</li>
    </ul>
  </li>
  <li> New style options IconBackgroundColorset, IconTitleColorset,  HilightIconTitleColorset, IconTitleRelief, IconBackgroundRelief  and IconBackgroundPadding.</li>
  <li> Minor incompatible improvements to the Perl library API.</li>
  <li> Renamed FvwmWindowLister to FvwmWindowMenu.</li>
  <li> New option to IconSize style: Adjusted, Stretched, Shrunk.</li>
  <li> New shortcuts for button states: AllActiveUp, AllActiveDown,  AllInactiveUp, AllInactiveDown.</li>
  <li> New Style options:
    <ul>
        <li>    Closable, Iconifiable, Maximizable, AllowMaximizeFixedSize</li>
    </ul>
  </li>
  <li> New conditions for matching windows:
    <ul>
        <li>    Closable, Iconifiable, Maximizable, FixedSize and HasHandles</li>
    </ul>
  </li>
  <li> New conditional command On for non-window related conditions.</li>
  <li> Removed --disable-gnome-hints and --disable-ewmh configure  options.</li>
  <li> All single letter variables are deprecated now; new variables:
    <ul>
        <li>    $[w.id], $[w.name], $[w.iconname], $[w.class], $[w.resource],    $[desk.n], $[version.num], $[version.info], $[version.line],    $[desk.pagesx], $[desk.pagesy]</li>
    </ul>
  </li>
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
  <li> Fixed flickering in FvwmTaskBar, FvwmWinList, FvwmIconBox,  FvwmForm, FvwmScript and FvwmScroll when xft fonts or icons with  an alpha channel are used.</li>
  <li> New Colorset option RootTransparent</li>
  <li> The Transparent Colorset option can be tinted under certain  conditions</li>
  <li> New MinHeight option to TitleStyle</li>
  <li> Added gettext support. New command LocalePath and new variable  $[gt.string]</li>
</ul>


<a name="2.5.4"></a>
<h4>Changes in alpha release 2.5.4 (20-Oct-2002) <a href="#top">[top]</a></h4>
<ul>
  <li> FvwmTaskBar may now include mini launch buttons using the Button  command.  Also has new options for spacing the buttons:  WindowButtonsLeftMargin, WindowButtonsRightMargin, and  StartButtonRightMargin.  See man page for details.</li>
  <li> Style switches can be prefixed with '!' to inverse their meaning.  For example, &quot;Style * Sticky&quot; is the same as &quot;Style * !Slippery&quot;.  This works *only* for pairs of styles that take no arguments and  for the Button and NoButton styles.</li>
  <li> New button property Id in FvwmButtons. FvwmButtons now accepts  dynamical actions using SendToModule, see the man page:
    <ul>
        <li>    ChangeButton &lt;button-id&gt; &lt;properties-to-change&gt;</li>
        <li>    ExpandButtonVars &lt;button-id&gt; &lt;command-to-expand&gt;</li>
    </ul>
  </li>
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
  <li> Fixed interaction bug between CascadePlacement and StartsOnPage:  if the target page was at a negative x or y page displacement  from the current viewport, the window would be placed on the  wrong page.</li>
  <li> New Style option IconSize for restricting icon sizes.</li>
  <li> New WindowList options SortClassName, MaxLabelWidth, NoLayer,  ShowScreen, ShowPage, ShowPageX and ShowPageY.</li>
  <li> Restored old way of handling clicks in windows with ClickToFocus  and ClickToFocusPassesClickOff.  This fixes a problem with  click+drag in an unfocused rxvt or aterm window.</li>
  <li> Fixed wrong warp coordinates when WarpToWindow was used with two  arguments on an unmanaged window.</li>
  <li> Vastly improved FvwmEvent performance.</li>
  <li> FvwmAuto can operate on Enter and Leave events too. This makes  it possible to have auto raising with ClickToFocus and  NeverFocus. See -menter and -menterleave options and examples in  the FvwmAuto man page.</li>
  <li> The &quot;hangon&quot; strings in FvwmButtons support wild cards.</li>
  <li> New option &quot;Icon&quot; to PlaceAgain command.</li>
  <li> New option &quot;FromPointer&quot; and direction &quot;Center&quot; to the Direction  command.</li>
  <li> The styles ClickToFocusRaises(Off) and  MouseFocusClickRaises(Off) are now different names for the same  style.  Configurations that used
    <ul>
        <li>    Style * ClickToFocus, ClickToFocusRaises</li>
        <li>    Style * MouseFocusClickRaisesOff</li>
    </ul>
    or vice versa no longer work as like before.  Remove the second  line to fix the problem.  ClickToFocusRaises now works only on  the client part of a window, not on the decorations as it did  before.</li>
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
  <li> Provided powerful perl library for creating fvwm modules in  perl.</li>
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
  <li> New option StartCommand for FvwmTaskBar to allow placing the  StartMenu correctly.
    <ul>
        <li>    *FvwmTaskBar: StartCommand Popup RootMenu \</li>
        <li>        rectangle $widthx$height+$left+$top 0 -100m</li>
    </ul>
    Please refer to the FvwmTaskBar man page for details.</li>
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
  <li> New conditional command ThisWindow.</li>
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
  <li> New commands EWMHBaseStruts and EWMHNumberOfDesktops.</li>
</ul>


<a name="2.4.20"></a>
<h4>Changes in stable release 2.4.20 (6-Dec-2006) <a href="#top">[top]</a></h4>
<ul>
  <li> The configure script now correctly appends executable file  extensions to conditionally built binaries. Fixes building on  Cygwin.</li>
  <li> FvwmConsole no longer conflicts with getline of Cygwin's stdio.</li>
  <li> Fixed parsing of For loops in FvwmScript.</li>
  <li> Fixed a possible endless loop when de-iconifying a transient  window.</li>
  <li> Reject some invalid GNOME hints.</li>
  <li> Fixed a loop when xterm changes its &quot;active icon&quot; size.</li>
  <li> The configure script can now cope with four-part version numbers  when detecting some libraries.</li>
  <li> Security fixes in
    <ul>
        <li>     fvwm-menu-directory. (CVE-2006-5969)</li>
        <li>     FvwmCommand</li>
    </ul>
  </li>
</ul>


<a name="2.4.19"></a>
<h4>Changes in stable release 2.4.19 (30-Sep-2004) <a href="#top">[top]</a></h4>
<ul>
  <li> Fixed BackingStore style option.</li>
  <li> Fixed MoveToDesk commend with a single argument.</li>
  <li> Allow whitespace in menu names.</li>
  <li> Fixed a hang when restarting FvwmCommand or FvwmConsole.</li>
  <li> A double click no longer occurs when two different mouse  buttons are pressed.</li>
  <li> Fixed a relief drawing problem in FvwmWinList.</li>
  <li> Fixed travelling windows on restart if a window used non NorthWest  gravity and changed that before the restart.</li>
  <li> Fixed installation of FvwmGtk.1 for debian (with DESTDIR set).</li>
  <li> The clock in FvwmTaskBar is redrawn immediately when its colour  changes.</li>
  <li> The option CurrentGlobalPageAnyDesk was accidentally named  CurrentGlobbalPageAnyDesk before.</li>
  <li> Fixed a problem with fvwm startup and shutdown when the pointer  was grabbed by another application.</li>
  <li> Fixed parsing of the Pointer option to the Move command.</li>
  <li> Fixed handling of MWM hints on 64 bit machines.</li>
</ul>


<a name="2.4.18"></a>
<h4>Changes in stable release 2.4.18 (19-Mar-2004) <a href="#top">[top]</a></h4>
<ul>
  <li> Corrected rebooting the machine in FvwmScript-Quit.</li>
  <li> Fixed the FlickeringMoveWorkaround option to the BugOpts command.</li>
  <li> Security patch in fvwmbug.sh.  See http://securitytracker.com/alerts/2004/Jan/1008781.html</li>
  <li> Security fixes in    fvwm-menu-directory (BugTraq id 9161)
    <ul>
        <li>    fvwm_make_directory_menu.sh</li>
        <li>    fvwm_make_browse_menu.sh</li>
    </ul>
  </li>
</ul>


<a name="2.4.17"></a>
<h4>Changes in stable release 2.4.17 (10-Oct-2003) <a href="#top">[top]</a></h4>
<ul>
  <li> Fixed error message for incorrect --with-SOME-library argument.</li>
  <li> It is now possible to suppress title action or title completely  in menus created by fvwm-menu-directory.</li>
  <li> Fixed a compile problem on QNX 4.25.</li>
  <li> New configure switch --disable-gtk.</li>
  <li> FvwmGtk.1 is not installed if FvwmGtk is not built.</li>
  <li> The &quot;Visible&quot; condition does no longer select windows on  different desks.</li>
  <li> With the styles StartsOnPage, SkipMapping and UsePPosition,  windows that request a specific position are still placed on the  given page.</li>
  <li> Fixed sending M_NEW_PAGE packets to the modules if the page did  not change.</li>
  <li> Added support for new BBC headlines in fvwm-menu-headlines, this  replaces the old BBC-Worlds and BBC-SciTech headlines.</li>
</ul>


<a name="2.4.16"></a>
<h4>Changes in stable release 2.4.16 (30-May-2003) <a href="#top">[top]</a></h4>
<ul>
  <li> Fixed a transparency problem in FvwmButtons.</li>
  <li> The PageOnly option in FvwmTaskBar now works after a desk change  too.</li>
  <li> Fixed a possible core dump when more than 256 windows are on  the desktop.</li>
  <li> Initial drawing and final undrawing of wire frame no longer  toggles the pixel in the top left corner of the screen.</li>
  <li> Fixed parsing of button geometries in FvwmButtons when the  geometry specification appeared after another option with a comma  at the end.</li>
  <li> FvwmCommand works too when invoked without the DISPLAY variable  set.</li>
  <li> Fixed displaying iconified windows without an icon in  FvwmIconMan.</li>
  <li> All single letter variables are deprecated now; new variables:
    <ul>
        <li>    $[w.id], $[w.name], $[w.iconname], $[w.class], $[w.resource],    $[desk.n], $[version.num], $[version.info], $[version.line],    $[desk.pagesx], $[desk.pagesy]</li>
    </ul>
  </li>
  <li> Fixed a bug with aspect pixmaps in colorsets.</li>
  <li> Iconified windows without an icon do not receive focus.</li>
  <li> Fixed a bug in FvwmPager that displayed iconified windows without  icon title or picture as not iconified.</li>
  <li> Fixed parsing of '@&lt;screen&gt;' Xinerama specification in the  ButtonGeometry option of FvwmButtons.</li>
  <li> The NoWarp menu position hint option works with root menus too.</li>
  <li> Fixed a problem with styles not being properly applied after a  DestroyStyle command.</li>
  <li> Fixed a bug introduced in 2.4.14. The pointer was sometimes  warped to another screen during a restart and command execution.</li>
  <li> Fixed a crash when a window was destroyed twice in a complex  function.</li>
  <li> Fixed corruption of the window list when windows died at the  wrong time.</li>
  <li> Fixed problem with empty frame windows if X recycled the window  id of a window that died recently.</li>
  <li> Fixed loading of application supplied pixmap on 8/24 depth screen.</li>
  <li> WindowListFunc is executed now within a window context, so  a prefix &quot;WindowId $0&quot; is not needed in its definition anymore  and it is advised to remove it in user configs.</li>
  <li> FvwmEvent now executes all window related events within a window  context, so PassId is not needed anymore, and all prefixes  &quot;WindowId $0&quot; may be removed in user event handlers.</li>
  <li> Fixed &quot;GotoDeskAndPage prev&quot; on desks larger than 2x2.</li>
  <li> Expansion of variables like $[w.name] or $[EMPTY_STRING] that are  empty works.</li>
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
  <li> Fixed displaying menu items with icons when using the MenuStyle  SubmenusLeft.</li>
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
  <li> Desk and page can be given as X resources in .Xdefaults, for  example:
    <ul>
        <li>    xterm.desk: 1</li>
        <li>    xterm.page: 1 2 3</li>
    </ul>
  </li>
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
  <li> Fixed a problem with maximizing windows with the viewport not  starting on a page boundary.</li>
  <li> Fixed handling of parentheses in FvwmButtons button actions.</li>
  <li> Work around a key binding problem with keys that generate the  same symbol with more than one key code (e.g. Shift-F1 = F11).</li>
  <li> The Desk option of FvwmBacker is compatible to earlier  version. Desk or Page coordinates can be omitted to indicate  that desk or page changes trigger no action at all.</li>
  <li> Fixed double updating of background with FvwmBacker sometimes  leading to the wrong background.</li>
  <li> Fixed several escaping errors in fvwm-menu-directory, so files  and directories containing special chars and spaces should  work.</li>
  <li> Fixed PlacedByButton3 condition.</li>
  <li> Fixed vanishing windows when mapping/unmapping too fast.</li>
  <li> Fixed prev option of the GotoDeskAndPage command.</li>
  <li> Fixed calculations of X_RESOLUTION and Y_RESOLUTION for screen  dimensions larger than 2147.</li>
  <li> Fixed compatibility of the FvwmM4 modules on platforms that have  a System V implementation of m4 (Solaris 2.6).</li>
  <li> The SetEnv command without a value for a variable is the same as  UnsetEnv.</li>
  <li> Fixed shading/unshading shaped windows and windows without title  and border.</li>
</ul>


<a name="2.4.0"></a>
<h4>Changes in stable release 2.4.0 (03-Jul-2001) <a href="#top">[top]</a></h4>
<ul>
  <li> Finally released. :)</li>
</ul>


<?php decoration_window_end(); ?>
