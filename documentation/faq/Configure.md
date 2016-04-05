Features, configuration, functions & commands
=============================================

#### I use fvwm on a RedHat Linux system and can't figure out how to change my fvwm configuration.  I've read the fvwm man page but when I edit my .fvwm2rc nothing seems to happen.  What's going on?

  __OLD__

  RedHat Linux installs the X server accompanied (by default) by a
  configuration management system.  In earlier releases it was called
  TheNextLevel and in more recent releases it's called
  AnotherLevel. For further information about TheNextLevel, consult
  RedHat's documentation in /usr/doc/TheNextLevel/.  For information
  about AnotherLevel, do a 'man AnotherLevel'.


#### Is it possible to raise a window when I click into the window itself, not just the border?

 Any version later than 2.0.46 (i.e. 2.1.0 or later) has this
 feature.  In the 2.2.x series, use:

     GlobalOpts MouseFocusClickRaises

  With the later 2.3.x betas and after use:

     Style * MouseFocusClickRaises

#### How do I get Alt-Tab behavior like another GUI?

  The built in command WindowList provides a very close approximation
  to the Alt-Tab feature found in another GUI.  It doesn't look the
  same but the following fvwm/config sample will provide a similar
  interface:

      Key Tab A M WindowList Root c c NoDeskSort

  Starting with release 2.3.2, the above key binding is built-in.

  Starting with release 2.3.15 you can hold the alt key down and keep
  hitting tab.  A single alt-tab selects the previous window. The
  remainder of this FAQ entry describes releases prior to 2.3.2.

  Hitting Alt-Tab will pop up the WindowList menu.  Unlike another
  GUI you should not keep the Alt key held down, the menu will stay
  up until you hit Return/Enter/Space or Escape.  You can change
  focus to a window on the menu by using the up and down arrow keys
  to move the menu selection and then hitting Return or
  Enter. Hitting Escape will close the menu without doing anything.
  The WindowList menu has hot keys assigned for the first 26 windows
  and you can use the hot key to go directly to the window.

  The menu invoked with the above line will show all windows in most
  recently focused order unless you have used the Focus command (see
  Q3.4).  It shows each windows name and geometry with some extra
  flags to indicate Sticky, OnTop and iconified windows.

  A simpler style can be used with the following:

      Key Tab A M WindowList Root c c CurrentDesk, NoGeometry

  This will just list the windows on the current desk (titles only).

  The other GUI has the feature of selecting the previous window if
  Alt-TAB is hit and released quickly.  This behavior can be exactly
  duplicated with 2.5.1 or later but not with earlier fvwm versions.

     Key Tab A M WindowList Root c c \
       CurrentDesk, NoGeometry, CurrentAtEnd, IconifiedAtEnd

  Similar functionality can be assigned to hitting Alt-TAB twice in
  quick succession (like a double click for keys):

     DestroyFunc my_dbltab2
     AddToFunc   my_dbltab2
     + I WindowListFunc

     DestroyFunc my_dbltab
     AddToFunc   my_dbltab
     + I Prev (CurrentDesk) my_dbltab2

     Key Tab A M WindowList Root c c \
       CurrentDesk, NoGeometry my_dbltab

  There are a lot of options to the WindowList command to control
  which windows are listed in which order and it may not be possible
  to set conditions for the Prev command to reliably select the
  second item when double keying.  The WindowList command has no
  parallel for CurrentPage, Transient, Visible, Maximized, Raised,
  and pattern matching.  The Prev conditions have no parallel for
  OnTop, Alphabetic and desk sorting.  The WindowList menu respects
  the WindowListSkip style attribute whereas Prev respects the
  CirculateSkip and CirculateSkipIcon style attributes.

#### What's the difference between the Focus and FlipFocus commands?

  Both of these commands change the keyboard focus to the target
  window.  They differ only in the way they affect the internally
  held list of windows.  This list is used by the Next, Prev and
  WindowList commands.  The list is normally sorted in most recently
  focused order with new windows being added to the end.  The
  FlipFocus command plucks the target window from the list and
  inserts it at the beginning, The Focus command rotates the list
  around until the target window is at the beginning.  The behavior
  of FlipFocus is also used when changing focus with the mouse and
  the automatic focus changing when using ClickToFocus style.

  If you never use the Focus command the list will remain in most
  recently focused order.  If you do use the Focus command the list
  will gradually get back to most recently focused order as you use
  FlipFocus.

  The Focus command is very useful in conjunction with the Next and
  Prev commands.  e.g.

      Key KP_Add A M Next (AcceptsFocus, CurrentDesk, !Iconic) Focus
      Key KP_Subtract A M Prev (AcceptsFocus, CurrentDesk, !Iconic) Focus

  Or for fvwm versions earlier than 2.4.1:

      Key KP_Add A M Next [CurrentDesk !Iconic] Focus
      Key KP_Subtract A M Prev [CurrentDesk !Iconic] Focus

  These bindings allow you to circulate the focus around the windows
  on the current desk in both directions.  If Prev FlipFocus were
  used the focus would toggle between the top two windows on the
  window list.

  If you have several windows on a desk and you want to set the
  circulation order for the Next and Prev commands you should focus
  on the windows using the mouse or FlipFocus in the order you want.
  Fvwm will learn the order and use it for the Next and Prev
  commands.  If you subsequently use the mouse to focus or FlipFocus
  the order will be lost.

#### You can bind mouse movements to keystrokes, how about mouse presses?

  Although fvwm has commands for binding movements to keystrokes,
  controlling the pointer with the keyboard should really be handled
  by the X server.  The following is an excerpt of the X FAQ on this
  topic:

  If you have the X Keyboard (XKB) Extension, you can enable mouse
  keys, which makes it possible to generate mouse motion and button
  events using the keyboard.  Events generated by MouseKeys are
  completely transparent -- they will work with any application
  that connects to a server that has the X Keyboard Extension,
  regardless of whether the application itself uses XKB.

  XKB is enabled by default in X11R6.1.

  First, set up the Num Lock key so that Shift+Num_Lock
  toggles mouse keys:

       $ xmodmap -e "keysym Num_Lock = Num_Lock Pointer_EnableKeys"

  (XFree86 3.1.2E is based on R6.1 and has the X Keyboard
  Extension; it also has a binding to Pointer_EnableKeys in
  its default keymap. You use Alt+Shift+Num_Lock to toggle
  MouseKeys on and off.  If you are using an earlier release
  of X or XFree86, you won't have XKB and the instructions
  will not work.  See http://www.XFree86.org/FAQ for more
  information.)

  You might also have to turn off server num lock for this to
  work.  Now press "Shift+Num_Lock" to enable MouseKeys.  When
  MouseKeys are on:

    - The keypad arrow keys move the pointer
    - The keypad '5' key behaves like the 'default' pointer
      button.
    - The keypad '0' key locks the default pointer button
      (for easy dragging).
    - The keypad '.' key unlock the default pointer button
      (to release a drag).
    - The keypad '+' key double-clicks the default pointer
      button.
    - The keypad '/' key sets the 'default' button to Button1
    - The keypad '*' key sets the default button to Button2
    - The keypad '-' key sets the default button to Button3

  This is the default configuration, but the mechanism allows
  for nearly infinite configurability.

  [thanks to Erik Fortune (erik@westworld.engr.sgi.com), 6/96]

#### I'd like to bind a key to paste/use the current selection, how can I do that?

  You can't directly with fvwm, but there may be a solution that is
  more generally applicable - use the program 'xcb' available at
  ftp://ftp.x.org/contrib/utilities/ or from your favorite mirror.
  It could probably be used to get the desired effect or close to
  it. This is most useful for running programs and passing the
  selection to them (e.g. - invoke your favorite browser with the
  current selection as the URL).  To get a semi-generic paste
  facility to work, you'll probably need to use 'xse' (see Q3.5).  If
  anyone comes up with a good example of this, please send it to the
  fvwm mailing list for inclusion here.

#### Will fvwm ever support a separate colormap for each desktop?

  Doubtful, although I'd like to see it too.  I believe that it'd be
  possible to change the default colormap whenever you switch desks,
  which would give programs started when that desk is active that
  colormap, how would you deal with windows being moved across desks?

  Plus fvwm itself needs certain colormap entries for all of its
  drawing (borders, menus, etc), so these colors would have to be
  pre-allocated in all of the colormaps, or something like that.

  While this all *might* be technically possible, I don't feel that
  it's really feasible right now (too much code bloat and
  complexity), especially since most color hog programs
  (i.e. Netscape) allow you to have them install private colormaps.

  I may explore this a little at some point in the future though.

#### I really like the horizontal bars that appear on the title bars of sticky windows.  Can I get those on other windows as well?

  Yes.  For release 2.3.14 and after, put the line

     Style * StippledTitle

#### How do I set the Sun keyboard key xxxx to an fvwm command? Or more generally, I'm having problems defining key bindings for fvwm - what can I do?

  From Jon Mountjoy, one of fvwm's users:
   - Function keys on Sun Keyboard on Top Row are F1 - F8
   - Keys on the function keypad on the Left of the Sun Keyboard
     are F11 == Stop, F12 == Again, ..., F20 == Cut

     His Example:

     # Function keys on Sun Keyboard on Top Row
     Key F1     A     N       Exec me(netscape) &
     Key F2     A     N       Exec me(netscape -install) &
     Key F5     A     N       Exec makex(Adder)
     Key F6     A     N       Exec makex(Lambda)
     Key F7     A     N       Exec makex(Castor)
     Key F8     A     N       Exec xterm -T Local &

     # Keys on the function keypad on the Left of the Sun Keyboard:
     # F11 = Stop, F12 = Again, ..., F20 = Cut
     Key F11    AWF   N       Next (!iconic, CurrentPage) Focus
     Key F12    AWF   N       Prev (!iconic, CurrentPage) Focus
     Key F13    WF    N       Maximize     100 100
     Key F15    WF    N       RaiseLower ""
     Key F17    WIF   N       Iconify ""
     Key F18    WF    N       Stick ""
     Key F20    WIF   N       Delete ""
     Key Help   AWF   N       Iconify ""

  A more general solution is to use xev (usually distributed w/ X11)
  or xkeycaps (an X11 interface to xmodmap written by Jamie Zawinski,
  available from ftp.x.org) to find out what the keysym for whatever
  key you want REALLY is, and use that for binding fvwm commands.

#### My .fvwmrc from version 1.xx no longer works. What do I do?

  Start with a new one or convert your old one.  This can be done by
  hand or with a little help from the 'fvwm-convert-2.2' in the
  utils directory.

  And here is a list of rc file command changes compiled by Makoto
  'MAR_kun' MATSUSHITA <matusita@ics.es.osaka-u.ac.jp>.  It may or
  may not be 100% accurate or complete, especially as changes evolve,
  but it's a good start.

  Note that there have been some changes in 2.1.x and up that are not
  reflected in the conversion script yet.

    ** Fvwm-1.xx commands **                   ** Fvwm-2.0.x equivalent **

    AppsBackingStore                           (obsoleted)
    AutoRaise delay                            (obsoleted, use FvwmAuto)
    BackingStore                               (obsoleted)
    BoundaryWidth Width                        Style (BorderWidth width)
    ButtonStyle button# WidthxHeight           <-
    CenterOnCirculate                          (obsoleted)
    CirculateSkip windowname                   Style (CirculateSkip)
    CirculateSkipIcons                         Style (CirculateSkipIcon)
    ClickTime delay                            <-
    ClickToFocus                               Style (ClickToFocus)
    Cursor  cursor_num cursor_type             CursorStyle context cursornum
    DecorateTransients                         Style (DecorateTransient)
    DeskTopScale Scale                         (obsoleted, use FvwmPager)
    DeskTopSize HorizontalxVertical            <-
    DontMoveOff                                (obsoleted)
    EdgeResistance scrolling moving            <-
    EdgeScroll horizontal vertical             <-
    Font fontname                              MenuStyle (arg4)
    Function FunctionName                      AddToFunc (not compatible)
    HiBackColor colorname                      Style (HilightFore color)
    HiForeColor colorname                      Style (HilightFore color)
    Icon windowname bitmap-file                Style (Icon iconname-file)
    IconBox left top right bottom              Style (IconBox l t r b)
    IconFont fontname                          Style (IconFont fontname)
    IconPath path                              ImagePath path
    Key keyname Context Modifiers Function     <-
    Lenience                                   Style (Lenience)
    MenuBackColor colorname                    MenuStyle (arg2)
    MenuForeColor colorname                    MenuStyle (arg1)
    MenuStippleColor colorname                 MenuStyle (arg3)
    Module ModuleName                          <-
    ModulePath path                            <-
    Mouse Button Context Modifiers Function    <-
    MWMBorders                                 Style (MWMBorder)
    MWMButtons                                 Style (MWMButtons)
    MWMDecorHints                              Style (MWMDecor)
    MWMFunctionHints                           Style (MWMFunctions)
    MWMHintOverride                            Style (HintOverride)
    MWMMenus                                   MenuStyle (arg5)
    NoBorder windowname                        Style (NoBorder)
    NoBoundaryWidth Width                      Style (HandleWidth width)
    NoPPosition                                Style (NoPPosition)
    NoTitle windowname                         Style (NoTitle)
    OpaqueMove percentage                      OpaqueMoveSize percentage
    OpaqueResize                               (obsoleted)
    Pager  X_Location Y_Location               (obsoleted, use FvwmPager)
    PagerForeColor colorname                   (obsoleted, use FvwmPager)
    PagerBackColor colorname                   (obsoleted, use FvwmPager)
    PagerFont fontname                         (obsoleted, use FvwmPager)
    PagingDefault pagingdefaultvalue           (obsoleted)
    PixmapPath                                 ImagePath path
    Popup PopupName                            AddToMenu (not compatible)
    RandomPlacement                            Style (RandomPlacement)
    SaveUnders                                 (obsoleted)
    SloppyFocus                                Style (SloppyFocus)
    SmartPlacement                             Style (SmartPlacement)
    StartsOnDesk windowname desk-number        Style (StartsOnDesk desk-number)
    StaysOnTop windowname                      Style (StaysOnTop)
    StdBackColor colorname                     Style (BackColor color)
    StdForeColor colorname                     Style (ForeColor color)
    StickyBackColor colorname                  (obsoleted)
    StickyForeColor colorname                  (obsoleted)
    Sticky windowname                          Style (Sticky)
    StickyIcons                                Style (StickyIcon)
    StubbornIcons                              (obsoleted)
    StubbornIconPlacement                      (obsoleted)
    StubbornPlacement                          (obsoleted)
    Style windowname options                   <-
    SuppressIcons                              Style (NoIcon)
    WindowFont fontname                        Style (Font fontname)
    WindowListSkip windowname                  Style (WindowListSkip)
    XORvalue number                            <-

    ** fvwm-1 built-in functions **

    Beep                                       <-
    CirculateDown [ name window_name ]         Next (not compatible)
    CirculateUp [ name window_name ]           Prev (not compatible)
    Close                                      <-
    CursorMove horizontal vertical             <-
    Delete                                     <-
    Desk arg1 arg2                             <-
    Destroy                                    <-
    Exec name command                          <-
    Focus                                      <-
    Function                                   <-
    GotoPage  x y                              <-
    Iconify [ value ]                          <-
    Lower                                      <-
    Maximize [  horizontal vertical ]          <-
    Module name ModuleName                     Module ModuleName
    Move [ x y ]                               <-
    Nop                                        <-
    Popup                                      <-
    Quit                                       <-
    Raise                                      <-
    RaiseLower                                 <-
    Refresh                                    <-
    Resize [ x y ]                             <-
    Restart  name WindowManagerName            <-
    Stick                                      <-
    Scroll horizonal vertical                  <-
    Title                                      <-
    TogglePage                                 (obsoleted)
    Wait name                                  <-
    Warp [ name window_name ]                  Next or Prev (not compatible)
    WindowsDesk new_desk                       (obsoleted, use MoveToDesk)
    WindowList arg1 arg2                       <-
 
    ** New in fvwm-2 **

    All
    AnimatedMove
    BugOpts
    BusyCursor
    DefaultColors
    DefaultColorset
    DefaultFont
    DefaultIcon
    DefaultLayers
    Destroy
    DestroyMenu
    EdgeThickness
    Emulate
    EscapeFunc
    ExecUseShell
    HideGeometryWindow
    KillModule
    Layer
    Menu menu-name double-click-action
    MoveToDesk
    MoveToPage
    Next (conditions) command
    None (arguments) command
    Pick
    PointerKey
    Prev (conditions) command
    QuitSession
    Read filename
    Recapture
    RecaptureWindow
    SaveQuitSession
    SaveSession
    Silent
    SnapAttraction
    SnapGrid
    StrokeFunc
    XORPixmap
    +
    (more functions are being added from time to time, so please check
    the man page and the NEWS file too).

#### What happened to the fvwm 1.xx 'include' command?

  It was actually part of the M4 preprocessing.  You can use the
  'Read' builtin to get the same effect, or use the FvwmM4 module.

####  How do I get window titles on sub windows of ... (e.g. Netscape)?

  These windows are known as 'transient' windows because of their
  short lived nature.  To get the window decorations for transient
  windows you can use the Style command:

     Style * DecorateTransient

  or to switch it off:

     Style * NakedTransient

#### I just upgraded to version >= 2.3.2, and my configuratios settings disappeared!  How do I get them back?

  The directory for system-wide configuration files changed from
  ${sysconfdir} (/usr/local/etc, unless set otherwise at configure
  time) to a subdirectory, ${sysconfdir}/fvwm.  Move your config
  files by hand and restart fvwm.

  This change was made because fvwm now installs several files into
  this directory.

#### Some applications (e.g. Eterm) don't use the icon I defined for them. Why?

  Eterm provides its own icon and fvwm does not know if it is a plain
  icon or if Eterm wants to draw into it (like xbiff does when you
  get new mail).  You can explicitly override the application
  provided icon with a style command:

     Style <application-name> IconOverride

#### I don't like the gaps in my icon box when I de-iconify an application. Is there some kind of auto arrange function?

  Assuming you are using the IconBox option of the Style command
  this can be done with a tricky fvwm function.  Put the
  DeiconifyAndRearrange function below in your configuration file:

     DestroyFunc DeiconifyAndRearrange
     AddToFunc DeiconifyAndRearrange
      + C Iconify off
      + C All (CurrentPage, Iconic) PlaceAgain Icon

  This works with fvwm-2.5.3 and later.  Older fvwm releases can
  achieve the same effect with:

     DestroyFunc DeiconifyAndRearrange
     AddToFunc DeiconifyAndRearrange
      + C Iconify off
      + C All (CurrentPage, Iconic) RecaptureWindow

  However, as the Recapture and RecaptureWindow commands may be
  removed in the future, please use PlaceAgain instead of
  Recapture if possible.

  Also, replace all places where you call the Iconify builtin
  function to de-iconify an icon with a call to the new function.
  For example, replace

     DestroyFunc IconFunc
     AddToFunc IconFunc
      + C Iconify off
      + M Raise
      + M Move
      + D Iconify off

  with:

     DestroyFunc IconFunc
     AddToFunc IconFunc
      + C DeiconifyAndRearrange
      + M Raise
      + M Move
      + D DeiconifyAndRearrange

  and:

     Mouse 1 I A Iconify off

  with:

     Mouse 1 I A DeiconifyAndRearrange

#### How do I set up an fvwm menu item that shuts down my Linux machine?

  Write a little shell script to run the shutdown command.

  Install sudo on your system (see the man page, etc.)

  Set up the sudoers config file to allow you, your wife, etc. to run
  that script with root permissions.

  Add a menu item to your fvwm root menu (or wherever) that invokes
  "sudo /my/script/name".

#### Although the Recapture command is obsolete, do I still need it to apply certain style changes?

  Excerpt from the man page:

    There are many commands that affect look and feel of specific,
    some or all windows, like Style, Mouse, the FvwmTheme module (for
    fvwm 2.4.x), Colorsets and many others.  For performance reasons
    such changes are not applied immediately but only when fvwm is idle,
    i.e. no user interaction or module input is pending.  Specifically,
    new Style options that are set in a function are not applied until
    after the function has completed.  This can sometimes lead to
    unwanted effects.  To force that all pending changes are applied
    immediately, use the UpdateStyles, Refresh or RefreshWindow commands.

#### When my specific window (or all windows) pops up, I want it to get focus/be moved/be resized/be closed/be shaded...  How?

  The following discusses a general solution, you should substitute
  the application names used in the examples as well as fvwm commands
  (Move, Iconify, Close) with the ones you need.  To get resource
  names of an application you want to catch, use FvwmIdent module.

  The first possible approach to achieve what you want is to have a
  separate function to start your application, like:

     DestroyFunc StartKedit
     AddToFunc   StartKedit
     + I Exec exec kedit
     + I Wait kedit
     + I Next (kedit) Resize 100p 200p

  This approach has 3 problems:
   1. You need to use StartKedit function to start your application,
      this will not work if you start it from the command line.
   2. If for some reason the application is not started, fvwm waits
      for it in Wait, you will need to press Ctrl-Alt-Esc.
   3. If you have more than one kedit window, it is not guaranteed
      that the right one is resized.

  But this approach has one plus - it also enables any fvwm commands
  that you may want to issue before executing your command.  For
  example, to start kedit window iconic, but not affect its
  subwindows, you can use:

     DestroyFunc StartAppIconic
     AddToFunc   StartAppIconic
     + I Style $0 StartIconic
     + I Exec exec $0 $1
     + I Wait $0
     + I Style $0 StartNormal
     + I UpdateStyles

     StartAppIconic kedit /tmp/my.txt


  The second approach is to use FvwmEvent, this solves the first two
  problems (in fvwm 2.2) or all three problems (in fvwm 2.3 and
  later).

  The sample to use with fvwm 2.2.3+ versions (this resizes the newly
  created window "My Window", supposing you have only one such
  window):

     DestroyModuleConfig FvwmEvent*
     *FvwmEvent add_window SetGeometryForMyWindow

     DestroyFunc SetGeometryForMyWindow
     AddToFunc   SetGeometryForMyWindow
     + I Next ("My Window") Move +10p +10p
     + I Next ("My Window") Resize 100p 200p

     AddToFunc StartFunction I Module FvwmEvent

  The sample to use with fvwm 2.3.21 to 2.4.15 versions (consider to
  upgrade and use the version below).  This moves a newly created
  window named "My Window", and warps a pointer to all new windows
  regardless of their name:

     *FvwmEvent-NewWindow: Cmd
     *FvwmEvent-NewWindow: PassId
     *FvwmEvent-NewWindow: StartDelay 4
     *FvwmEvent-NewWindow: add_window FuncFocusWindow

     DestroyFunc FuncFocusWindow
     AddToFunc   FuncFocusWindow
     + I WindowId $0 ("My Window") Move 200p 100p
     + I WindowId $0 Focus
     + I WindowId $0 WarpToWindow

     AddToFunc StartFunction I FvwmEvent FvwmEvent-NewWindow

  And finally the suggested configuration for 2.5.7+ and
  2.4.16+. This moves a newly created window named "My Window", and
  wraps a pointer to all new windows regardless of their name:

     *FvwmEvent-NewWindow: StartDelay 4
     *FvwmEvent-NewWindow: add_window FuncFocusWindow

     DestroyFunc FuncFocusWindow
     AddToFunc   FuncFocusWindow
     + I ThisWindow ("My Window") Move 200p 100p
     + I Focus
     + I WarpToWindow

     AddToFunc StartFunction I FvwmEvent FvwmEvent-NewWindow

#### When my specific window (or all windows) is closed, I want to switch desks/wrap to my app X/popup a menu/start app X...  How?

  Please read the answer to the previous question to understand better.

  Again, there are two approaches.  The first is good in one kind of
  situations, bad in others:

     DestroyFunc StartKedit
     AddToFunc   StartKedit
     + I Exec kedit; xmessage -name DummyWindow -g +10000+10000 "dummy"
     + I Wait DummyWindow
     + I Exec xmessage -timeout 10 "Sorry, you can't close kedit"
     + I StartKedit

  The second approach is to use FvwmEvent:

     *FvwmEvent-OldWindow: Cmd
     *FvwmEvent-OldWindow: PassId
     *FvwmEvent-OldWindow: destroy_window FuncPopupMyMenu

     DestroyFunc FuncPopupMyMenu
     AddToFunc   FuncPopupMyMenu
     # go to the desk 0 when any window is closed
     + I GotoDesk 0
     # popup my menu when "panel" is closed
     + I WindowId $0 ("panel") Popup MenuFvwmRoot

     AddToFunc StartFunction I FvwmEvent FvwmEvent-OldWindow

#### I have a multi head setup (multiple screens used under X). How can I tell fvwm to use different configurations for the screens?

  Fvwm spawns itself into all found screens unless -s command line
  parameter is specified, as explained in the man page.  All spawned
  fvwm processes by default use the same configuration on each
  screen. There are several ways to change the default behavior.

  Write your configuration file as you would if you had only one
  screen.  Then move the screen specific lines into separate
  configuration files and call them, for example, config.<screen>
  where <screen> is the screen number.  Usually this will be 0 for
  the main screen and 1 for the secondary screen.  Place the screen
  specific files in the $HOME/.fvwm directory or whatever you set
  $FVWM_USERDIR to.  Now add this line to your config file:

     Read config.$[screen]

  The $[screen] will be replaced with the number of the screen each
  instance of fvwm is started on.


  Another method, which should work for older fvwm versions as well,
  is to specify a separate file for each screen explicitly.  For
  this, start a separate fvwm for each screen in your .xinitrc (or
  .Xclients):

     fvwm -s -d :0.0 -f config-0 &
     fvwm -s -d :0.1 -f config-1 &
     fvwm -s -d :0.2 -f config-2

  Note that only the last command is without a trailing ampersand.
  If you wish, config-* files may all include "Read config-common".

#### How do I maximize a window but not cover up FvwmTaskBar?

  Instead of Maximize use "Maximize 100 -30p" where 30 is the width
  of your FvwmTaskBar.

  Or use EwmhBaseStruts in Fvwm 2.5.x or later.

    # EwmhBaseStruts [left] [right] [top] [bottom]
    EwmhBaseStruts 0 0 0 30

#### Why my close button looks pressed in maximized windows? Why don't buttons show on the titlebar of some windows?

  Fvwm has some builtin idea of what the buttons do, and some
  applications can request that certain buttons not be shown.
  For example, it's normal for Fvwm to suppress the iconify button
  (builtin button 4, the second button from the right) on a
  transient (dialog) window.

  The command:

     Style * DecorateTransient

  tells fvwm you want titles and buttons on transient windows.

     Style * MwmFunctions

  tells fvwm to accept application hints to hide certain buttons.

     ButtonStyle 2 - Clear MWMDecorMin

  says button 2 performs the minimize (iconify) function.

     Mouse 0 2 A Iconify

  makes any mouse button on button 2 iconify the window.
  Buttons won't show until some action is assigned to them using
  Mouse or Key commands.

  Things to look for in the man page are:

     DecorateTransient, MwmDecorXXX, MwmFunctions

  So, if you use Windows-like buttons, then redefine button hints:

     ButtonStyle 1 - Clear MWMDecorMenu
     ButtonStyle 2 - Clear
     ButtonStyle 4 - Clear MWMDecorMax
     ButtonStyle 6 - Clear MWMDecorMin

  Finally, this command makes button relief to follow the state:

     Style * MWMButtons

#### How to define transparent menus?

  First, it may help to read about colorsets in fvwm and FvwmTheme
  man pages.

  We speak about transparency, not translucency here.  This means
  the background of the parent window (for example the root window)
  will be used for our "transparent" areas, this is not always the
  window under our "transparent" window.  However, it is possible
  to get a real transparency (i.e. translucency) by applying one
  patch and using new Colorset Translucent option the patch adds.
  We do not discuss this here, however you may get this patch with
  README.patch included from:

     http://fvwm-themes.sf.net/patch/

  To define a transparent colorset, use something like:

     Colorset 23 Transparent, fg rgb:ff/ff/c4, bg darkgray

  (you may use any other number greater than 0 instead of 23)

  There is another way to define transparent colorset, by using
  RootTransparent instead of Transparent, but please remember,
  you should use a good utility to set the root background image,
  like "fvwm-root -r" or "Esetroot" or "wmsetbg", otherwise
  RootTransparent will not work:

     Colorset 23 RootTransparent, fg rgb:ff/ff/c4, bg darkcyan

  The good thing about RootTransparent is that it is possible to
  automatically calculate the average background color (used for
  highlighting/shading) and efficiently tint the visible part of the
  root image using something like:

     Colorset 23 RootTransparent, fg rgb:ff/ff/c4, bg average, \
       Tint black 20, bgTint black 20

  If you have enough memory, you may use "RootTransparent buffer"
  to speed up transparent menus, modules or decorations.

  If you are not sure whether you use "fvwm-root -r" or similar
  utility to set the root background, do not use RootTransparent
  option, use Transparent option without tinting, and set the bg
  color explicitly.

  Once a transparent colorset is defined, use it in menus:

     MenuStyle * MenuColorset 23

  See the man pages for a more complete explanation of colorsets.

#### How to define transparent modules?

  See question 3.23 to learn how to define a transparent colorset
  (you may reuse the same transparent colorset or define separate
  colorsets for different modules).

  Then read the man page for your specific module that you want to
  make transparent and specify this transparent colorset(s), like:

     *FvwmPager: Colorset * 23
     *FvwmButtons: Colorset 23
     *FvwmIconMan: Colorset 23

     Style FvwmPager ParentalRelativity
     Style FvwmButtons ParentalRelativity
     Style FvwmIconMan ParentalRelativity

  A side note: the ParentalRelativity option is not always needed.
  It is not needed if you use RootTransparent or you never intend to
  move a module inside its parent, or you swallow a module, since
  FvwmButtons adds ParentalRelativity automatically for swallowed
  fvwm modules.  Otherwise you need Style ParentalRelativity for
  transparent windows, but doing this for all windows is overhead.

  Note, that previously "Pixmap none" option was used to define
  transparency; Pixmap option is obsolete, use colorsets instead.

  If you swallow FvwmPager (or FvwmIconMan) into FvwmButtons, then
  you may configure both FvwmPager and FvwmButtons to be transparent
  or just one of them to be transparent, depending on what you want
  to achieve.

#### How to define transparent decorations?

  See question 3.23 to learn how to define a transparent colorset.
  Only RootTransparent method works for transparent decorations!
  This basically means that you should use external utilities like
  "wmsetbg" or "Esetroot" to set background in JPG/GIF/TIFF format
  and our utility "fvwm-root -r" for XPM/PNG images.

  To get transparent decorations, use a configuration like this:

     AddToFunc StartFunction
     + I Exec fvwm-root -r $HOME/wallpapers/sea.png

     Colorset 41 RootTransparent buffer, fg white, bg average, \
       Tint cyan 15, bgTint cyan 15  # tint is optional
     Colorset 42 RootTransparent buffer, fg white, bg average, \
       Tint red  15, bgTint red  15  # tint is optional

     Style * Colorset 41, HilightColorset 42  # to use fg and bg
     BorderStyle Inactive Colorset 42 -- flat
     BorderStyle Active   Colorset 41 -- flat
     TitleStyle AllInactive Colorset 42 -- flat
     TitleStyle AllActive   Colorset 41 -- flat
     ButtonStyle All -- UseTitleStyle flat

  It is possible to define partially transparent decorations too.
  You may achieve this by adding "AddTitleStyle Colorset NN PP",
  or even "TitleStyle Colorset NN PP".  Please read the man page.
  Also search in fvwm-themes to see whether some theme provides
  the window decoration look similar to what you want to achieve.

#### How about transparent applications too?

  This is not really an fvwm related question, you should find X
  applications supporting transparency and read their documentation.

  Depending on the application you should set the root image in one
  or another way.  Usually utilities like fvwm-root (with possible
  "-r" parameter), Esetroot or wmsetbg should be used.

  There is a wide range of terminal emulators that may be configured
  to be transparent, like Eterm, aterm, gnome-terminal and others.
  Here is an example command line:

     aterm -ls -sh 70 -bg black -fg white -tr +sb -fn 7x14 -fb 7x14bold

  Some applications have transparent theme, e.g. gkrellm and xmms.

  Some applications may show text on the root image, e.g. root-tail.

  There are a lot of other applications supporting transparency not
  listed here, search in FreshMeat, http://freshmeat.net/.

  Xcompmgr can also be used to give windows transparency.

#### How can I define emacs type multi-keystroke fvwm bindings?

  In emacs, keys can be set up as prefix keys, so that once
  you type the prefix key, a subsequent key has a special meaning.
  For example, Control-a would normally go to the beginning of a line
  but Control-c Control-a might do something completely different.
  There are at least 2 ways to do the same thing with fvwm.

  The simplest technique is to use the prefix key to invoke a menu
  and then use the menu hot keys as the second key in the binding.
  Since menu hot keys don't include modifiers, you can only use plain
  keys for the second key in the sequence.

  This second technique lets you use any key for the second key but
  only works with 2.5.x or later.
  This approach invokes a function on the first key that defines the
  action of the second key for a short time and then removes it:

    DestroyFunc Ctrl-Alt-F-Action
    AddToFunc   Ctrl-Alt-F-Action
    + I Key X A A Exec xterm
    + I Key C A A Exec xcalc
    # optionally popup a prompt window here
    + I Schedule 5000 Key X A A -
    + I Schedule 5000 Key C A A -

    # Press Ctrl-Alt-F and then "x" or "c"
    Key F A CM Ctrl-Alt-F-Action

  With this, you press the second key in 5 seconds otherwise the
  binding for the second key is removed.


  With fvwm-2.5.24 or later (using SendToModule) a much better
  solution is:

      SendToModule buttons-alias PressButton A 1

  This would send the FvwmButtons instance "button-alias" a command
  to invoke the action that button "A" has as though the button were
  clicked with mouse button 1.  For instance:

      *button-alias: (Id A, Title "My Button", Action (Mouse 1) \
         `Exec exec xcalc`)

#### How do I remove all decorations from a window?


  I see this a lot on IRC.  Most people try and do this:

    Style * !Title, BorderWidth 0

  This doesn't always work because many forget about a window having
  having handles -- which sit on the border.  If a window has defined
  handles, then these effectively override any of border settings --
  especially the "BorderWidth" option.  But there are Handle
  equivalents, hence the correct way to remove decorations from a window
  would be:

    Style * !Title, !Borders, !Handles

  To set the BorderWidth of a window which has handles:

    Style * HandleWidth 5

#### What's the best way to make on-the-fly config changes?

  Often is the case, one might want to make config changes to fvwm.
  Adding them to the .fvwm2rc file (or in more recent releases
  .fvwm/.fvwm2rc or ~/.fvwm/config) and then restarting fvwm is one
  way -- but this has problems with memory, especially with Colorset
  definitions being redeclared, etc.

  The better approach to making changes is instead to use FvwmConsole
  which is a way of making live changes to fvwm configs.  When you're
  satisfied that they're correct, then you can add them to your fvwm
  config file so that they're there the next time fvwm loads, thus
  reducing the need to restart fvwm.

#### How can I toggle a window's layer?

  Usually what people want from this, is a means of making a window
  stay on top for a time, and then putting it back in the layer it
  was in originally.

  This is best achieved with a function, as in:

    DestroyFunc ToggleLayer
    AddToFunc   ToggleLayer
    + I ThisWindow (Layer 6) Layer
    + I TestRc (NoMatch) Layer 0 6

  This function first of all checks to see if the window that's going
  to be toggled is in layer 6 (which in this context is assumed to be
  the layer which is used for the style StaysOnTop -- see the
  DefaultLayers command for more information), and if it is, to put it
  in the layer it was previously in.

  Otherwise, if we didn't do it (because the window in question was in
  any other layer), the window is put in layer 6.

  This function can be bound in the usual way, either via the Pick
  command to some key/mouse binding, or bound to a button on the
  titlebar, etc.

