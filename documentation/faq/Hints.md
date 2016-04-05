Hints and examples from the developers
======================================

#### An easy way to test new configurations.

  Did you know that you do not need to restart X or fvwm to see what
  most configuration commands do? There are several modules
  that allow you to issue fvwm commands at any time.  Among
  these are FvwmCommand, "FvwmForm FvwmForm-Talk" and FvwmConsole.
  Personally I use FvwmCommand and FvwmConsole.

  When you run FvwmConsole you get a shell like window where you can
  type configuration commands that are sent to fvwm.  Just add an
  entry to some menu that starts it:

     AddToMenu main_menu
      + "FvwmConsole" Module FvwmConsole

  Using FvwmCommand is a bit more tricky.  To use it you need to
  start a server in your config by adding this line:

     Module FvwmCommandS

  Make sure FvwmCommand is in your search path.  Now you can enter
  commands on the command line of your favorite shell:

     FvwmCommand "MenuStyle * Font 6x9"

  Note that you have to quote the command.  The advantage of
  FvwmCommand over FvwmConsole is that you can use your shell with
  all its features to run commands (command completion and history
  for example).  The disadvantage is that it is a bit slow since a
  new FvwmCommand has to be started for each command.

  Other related modules and commands are FvwmScript and PipeRead.

#### Using shell commands for configuration.

  Sometimes you might want to use the output of a shell command or
  script in your config.  For example you might need a menu that
  has all filenames in a certain directory as its entries.  You can
  use the PipeRead command and the FvwmCommand module.  I recommend
  using PipeRead since creating twenty menu items takes a
  considerable amount of time with FvwmCommand.

  Example from my config:

     # make the background menu
      DestroyFunc MakeBackgroundMenu
      AddToFunc MakeBackgroundMenu
      + I DestroyMenu BackgroundMenu
      + I AddToMenu BackgroundMenu Backgrounds Title
      + I PipeRead 'for i in `/bin/ls $HOME/.fvwm/backgrounds/*.bg.*`; \
            do echo -e AddToMenu BackgroundMenu `basename $i | sed -e \
            "s/\.bg\..*$//"` Function SetDefaultBackground $i; done'

     # set the default background
     DestroyFunc SetDefaultBackground
     AddToFunc SetDefaultBackground
      + I Exec echo -e $0 > $HOME/.fvwm/background
      + I SetBackground

     # set a new background
     DestroyFunc SetBackground
     AddToFunc SetBackground
      + I Exec test -r $HOME/.fvwm/background && xv -root -quit -viewonly \
            `cat $HOME/.fvwm/background|tr -d "\n"`

     # activate setting from last session and build the menu
     AddToFunc StartFunction
      + I SetBackground
      + I MakeBackgroundMenu


  The MakeBackgroundMenu function builds a menu that contains an item
  for every file that matches the pattern "*.bg.*" in the directory
  $HOME/.fvwm/backgrounds.  The suffix .bg.* is removed.  When I
  select an item the file is displayed in the background using
  xv. Furthermore the path and filename are stored in
  $HOME/.fvwm/background.  When I start my next fvwm session the
  filename is fetched from there so I get the background from my last
  session.

  I have an even more complex setup for color palettes.

#### How to start applications on a page or desk other than the current?

  Use the 'StartsOnDesk' or 'StartsOnPage' style in your config:

     Style Netscape* StartsOnPage 0 1

  or

     Style Netscape* StartsOnDesk 1

  Any window with a title that begins with 'Netscape' will be placed
  on page 0 1 (desk 1).  You will probably want to use these options
  too:

     Style * RecaptureHonorsStartsOnPage, CaptureHonorsStartsOnPage

  If you want to start applications on a different page in the
  background without switching to this page, use the 'SkipMapping'
  style:

     Style Netscape* StartsOnPage 0 1, SkipMapping

#### How to start applications on a page or desk other than the current without moving the viewport to the new page or desk.

  Use the SkipMapping style:

     Style Netscape* StartsOnPage 0 1, SkipMapping

#### A more efficient MWM menu style.

  Perhaps you have noticed that with the MWM menu style your sub
  menus are shown as soon as the pointer enters their menu items,
  even if you just want to scroll down the list.  You can prevent
  this with the 'PopupDelay' and 'PopupDelayed' options of the
  MenuStyle command:

     MenuStyle mwm
     MenuStyle PopupDelayed, PopupDelay 80

  The sub menu will be shown 80 milliseconds after the pointer enters
  the menu item.  You will hardly notice the delay.  Note that 80 ms
  is just long enough to move through the menu with auto repeat on my
  cursor keys.  You may have to experiment with this number to get it
  right.

#### Placing menus on the screen.

  Do you have to close windows or move the pointer all over the
  screen to find some part of the background where you can bring up
  your main menu (or any other root menu)?

  Then you should use a keyboard shortcut.  For example

     Key  space A M   Menu root c c main_menu

  in your config gives you the menu 'main_menu' in the center of the
  screen when you press Alt-space.  Or you might want a shortcut to
  the window menu:

     Key  space A SM  Menu root c c WindowMenu

  You can place menus anywhere you like, not just where the mouse
  pointer is.  Please read the section for the 'Menu' command in the
  man page.

#### Are you flipping pages by accident when moving the mouse close to the border of the screen?

  You can disable page flipping with the EdgeScroll command:

     EdgeScroll 0 0

  in your config turns it off.

#### Lining up your windows and icons.

  The SnapAttraction and SnapGrid commands really help to keep your
  desktop tidy.  With SnapAttraction windows (or icons or both) are
  'attracted' to each other.  When you drag a window (icon) and it
  comes close to another window (icon) it clings to it without a gap
  between the borders.  Put this command in your config:

     SnapAttraction 8 SameType

  This means windows cling to other windows if they get closer than
  8 pixels and icons cling to icons.  Or if you just want it for
  windows/icons use

     SnapAttraction 8 Windows

  or

     SnapAttraction 8 Icons

  Or if you want icons to cling to windows and vice versa:

     SnapAttraction 8 All


  The SnapGrid command is a big help too:

     SnapGrid 8

  in your config tells fvwm to use a grid of 8 pixels to place
  windows and icons.  Try it and see if you like it.

  Hint: It might be a good idea to use a divisor of your desktop
  width and height for SnapGrid.

#### Moving the mouse/focus/page with the keyboard.

  Try these key bindings for mouse movement:

     # shift-<direction> to move a few pixels
     Key   Left   A   S   CursorMove -1 0
     Key   Right  A   S   CursorMove +1 +0
     Key   Up     A   S   CursorMove +0 -1
     Key   Down   A   S   CursorMove +0 +1

     # shift-meta-<direction> to move 1/4 page
     Key   Left   A   SM  Scroll -25 +0
     Key   Right  A   SM  Scroll +25 +0
     Key   Up     A   SM  Scroll +0  -25
     Key   Down   A   SM  Scroll +0  +25

  or these to flip pages

     # shift-control-<direction> to move a full page
     Key   Left   A   SC  CursorMove -10 +0
     Key   Right  A   SC  CursorMove +10 +0
     Key   Up     A   SC  CursorMove +0  -10
     Key   Down   A   SC  CursorMove +0  +10

     # Alt-Fn to go to a specific page (like on the Linux console)
     Key F1 A M GotoPage 0 0
     Key F2 A M GotoPage 1 0
     Key F3 A M GotoPage 0 1
     Key F4 A M GotoPage 1 1

  or to change the focus to a window in a specific direction:

     # number keys on keypad to move the focus
     Key KP_1 A C Direction SouthWest (AcceptsFocus) Focus
     Key KP_2 A C Direction South (AcceptsFocus) Focus
     Key KP_3 A C Direction SouthEast (AcceptsFocus) Focus
     Key KP_4 A C Direction West (AcceptsFocus) Focus
     Key KP_6 A C Direction East (AcceptsFocus) Focus
     Key KP_7 A C Direction NorthWest (AcceptsFocus) Focus
     Key KP_8 A C Direction North (AcceptsFocus) Focus
     Key KP_9 A C Direction NorthEast (AcceptsFocus) Focus

####  The cat safe desktop ^_^

  If your cats keep stepping on your keyboard while you are brewing
  another cup of coffee, one of these hints may help:

     Use 'Style * MouseFocus' and move the mouse pointer over the
     background when you go away.

  If you can't do without your 'SloppyFocus' you can move the
  mouse pointer into a window that takes no keyboard input and
  give it the focus (e.g. FvwmButtons or a console message
  window).  A true fanatic creates a separate window with a picture
  of his cat for this ^_^

#### Lowering and moving windows.

  In some configurations moving a window with the middle mouse
  button lowers the window after moving it.  Lowering it before
  moving gives you a nice visual effect:

     Mouse  2 T A  Function MoveOrLower

     DestroyFunc MoveOrLower
     AddToFunc MoveOrLower
      + C   Lower
      + M   Lower
      + M   Move
      + D   Lower

#### Toggling windows on and off.

  It is often desirable to have a menu item or perhaps a button in
  FvwmButtons or FvwmWharf that launches an application when used
  the first time and closes it if used a second time.  Although it
  is not obvious how to do this, it is possible.  Let's assume you
  need a menu item that toggles an FvwmConsole window on and off.

  Then put the following lines in your config (for fvwm-2.5.11 or
  later):

     DestroyFync ToggleFvwmConsole
     AddToFunc ToggleFvwmConsole
     + I ToggleWindow FvwmConsole "Module FvwmConsole"

     # Application toggling function
     # First argument is the window name, second argument is the
     # command to start the application.
     DestroyFunc ToggleWindow
     AddToFunc ToggleWindow
     + I None ($$0, CirculateHit) $$1
     + I TestRc (Match) Break
     + I Next (currentpage, visible, !iconic, $$0, CirculateHit) Close
     + I TestRc (Match) Break
     + I Next ($$0, CirculateHit) Function MakeVisible

     # Helper function
     DestroyFunc MakeVisible
     AddToFunc MakeVisible
     + I MoveToDesk
     + I MoveToPage
     + I MoveToScreen
     + I Raise
     + I Iconify off
     + I WindowShade off

  To invoke the function, you can add it to a menu

     AddToMenu <some menu>
     + "toggle FvwmConsole" Function ToggleFvwmConsole

  Or if you prefer a button in the button bar:

     *FvwmButtons: (Action ToggleFvwmConsole)

  The lines with MoveToDesk, MoveToPage and Raise will bring the
  window to the top of the current page if it is not visible
  instead of closing it.  The generic function ToggleWindow can be
  reused to toggle all kinds of windows.

  If you want to toggle one specific window, e.g. an xterm, but
  still want to have other xterms that are not toggled, you must
  give the window an unique name:

     DestroyFunc RunXMessages
     AddToFunc RunXMessages
     + I Exec exec xterm -T XMessages -n XMessages \
         -e tail -f /var/adm/?* ~/.X.err

     DestroyFunc ToggleXMessages
     AddToFunc ToggleXMessages
     + I ToggleWindow XMessages RunXMessages

  Keep in mind that these functions simply check if a window with
  the specified name exists.  They will happily close manually
  opened windows or launch an application multiple times if the
  application is slow to start (e.g. like netscape).

   For fvwm-2.5.10 or earlier, these functions should work too:

     DestroyFunc ToggleFvwmConsole
     AddToFunc ToggleFvwmConsole
     + I None (FvwmConsole, CirculateHit) FvwmConsole
     + I Next (FvwmConsole, CirculateHit, CurrentPage, Visible) Close
     + I Next (FvwmConsole, CirculateHit) MoveToDesk
     + I Next (FvwmConsole, CirculateHit) MoveToPage
     + I Next (FvwmConsole, CirculateHit) Raise

     DestroyFunc ToggleXMessages
     AddToFunc ToggleXMessages
     + I None (XMessages, CirculateHit) Exec exec \
       xterm -T XMessages -n XMessages -e tail -f /var/adm/?* ~/.X.err
     + I Next (XMessages, CirculateHit) Close

#### Starting applications by clicking on an icon (also known as "docking" applications).

  Normally an icon represents a minimized application.  If you
  want to turn that around, and launch applications by clicking
  on icons we can't stop you.  Heres a way to do that using
  FvwmButtons:

     # FvwmButtons icon launcher:
     DestroyFunc Launcher
     AddToFunc Launcher
     + I DestroyModuleConfig $0Launch: *
     + I *$0Launch: Geometry 64x68
     + I *$0Launch: Columns 1
     + I *$0Launch: Rows    4
     + I *$0Launch: Frame   0
     + I *$0Launch: (1x3+0+0, Icon $1, Action (Mouse 1) `Exec $2`)
     + I *$0Launch: Pixmap none
     + I *$0Launch: (1x1+0+3, Font 9x15, Fore White, Back DarkBlue, \
                    Title $0, Action (Mouse 1) `Exec $2`)
     + I Style $0Launch HandleWidth 0, NoTitle
     + I Module FvwmButtons $3 $0Launch
     # Examples:
     Launcher RXVT xterm.xpm "rxvt -bg black" "-g +0+0"
     Launcher XV   xv.xpm    "xv"   "-g +0+100"

  Also, GNOME and KDE have desktop icon applications gmc and kfm,
  which enable this functionality.  These applications may be run
  under fvwm. Nautilus (version >= 2) and kdesktop may be run under
  fvwm version 2.5.1 or better.

#### Positioning a window using arithmetic.

  This example shows how to center a window on the screen.  Note
  how is uses PipeRead and the shell construct $(()) in order to
  perform arithmetic.

     DestroyFunc CenterWindow
     AddToFunc   CenterWindow
     + I ThisWindow Piperead "echo Move \
       +$(( $[vp.width]/2-$[w.width]/2 ))p \
       +$(( $[vp.height]/2-$[w.height]/2 ))p"

  If you had a window named "MyWindow" you would center it using
  the command:

    Next (MyWindow) CenterWindow

  ThisWindow may be removed, it is only needed to avoid errors when
  CenterWindow is called without a window context.  (In which case
  see the Pick command.)

  With fvwm release 2.5.11, you can place windows in the center of
  the screen using "Style X CenterPlacement".

  But with fvwm release 2.5.22 and greater CenterPlacement is
  deprecated over the use of PositionPlacement style which allows for
  not only centering windows, but positioning windows anywhere on the
  screen using the same arguments as the Move command.  But in terms of
  centering windows:

      Style MyWindow PositionPlacement Center

#### Hiding the mouse pointer.

  Some users don't like the mouse pointer getting in the way of
  what they are looking at.  You might want to search for and
  install the "unclutter" program.  Unclutter hides the mouse
  pointer after you haven't moved the mouse for a while.

  If you find unclutter causes the pointer to flash on and off
  or move around on its own, run unclutter with the -noevents
  argument.

#### Finding the mouse pointer.

  Sometimes its hard to see the mouse pointer.  Here is a way to
  find it:

     Key Super_L A A Exec xmessage -name "SmallBlob" -bg red \
       -fg white -nearmouse -timeout 1 'I am here!'
     Style SmallBlob UsePPosition, NoTitle, NoHandles, BorderWidth 10

#### Autohiding FvwmButtons or other windows.

  Some applications have a feature usually called "autohiding"
  which allows to withdraw a window to a location where it does
  not use precious desktop space.  It is possible to write some
  small functions in fvwm that can hide any window you like:

  fvwm-2.5.11 or later:

     # The autohiding functions
     DestroyFunc autohide
     AddToFunc autohide
     + I ThisWindow ($0) Deschedule $[w.id]
     + I ThisWindow ($0) KeepRc ThisWindow (shaded) WindowShade off
     + I TestRc (!Match) All ($0, !shaded) autohide_hide $1 $2

     DestroyFunc autohide_hide
     AddToFunc autohide_hide
     + I Schedule $0 $[w.id] WindowShade $1
     + I Schedule $0 $[w.id] Deschedule $[w.id]

     # Start FvwmAuto
     AddToFunc StartFunction
     + I Module FvwmAuto 1 -menter enter_handler

     # Add the windows you want to autohide
     DestroyFunc enter_handler
     AddToFunc enter_handler
     + I autohide FvwmButtons 500 S
     #            ^           ^   ^
     #            |           |   |___  Shade direction (optional)
     #            |           |_______  Hide delay (milliseconds)
     #            |___________________  Unique window name/resource

  Simply add any windows you like to the enter_handler function
  as in the example above.  The autohide function is called with
  two or three parameters.  The first one is the window's name or
  class, which must be unique.  The second is the delay in
  milliseconds before the window is hidden after the pointer
  leaves it, and the last - optional - one indicates the
  direction in which it is hidden (N, S, E, W, NW, NE, SW or SE).

  You can find a slightly more complicated version below.  The
  difference is that showing the window does not happen
  immediately, but can be delayed too.

  fvwm-2.5.11 or later:

     DestroyFunc autohide
     AddToFunc autohide
     + I ThisWindow ($0) Deschedule $[w.id]
     + I TestRc (!Match) Deschedule -$[w.id]
     + I ThisWindow ($0) KeepRc ThisWindow (shaded) \
         autohide_show $1 $3
     + I TestRc (!Match) All ($0, !shaded) autohide_hide $2 $3

     DestroyFunc autohide_show
     AddToFunc autohide_show
     + I Schedule $0 -$[w.id] WindowShade $1 off
     + I Schedule $0 -$[w.id] Deschedule $[w.id]
     + I Schedule $0 -$[w.id] Deschedule -$[w.id]

     DestroyFunc autohide_hide
     AddToFunc autohide_hide
     + I Schedule $0 $[w.id] WindowShade $1 on
     + I Schedule $0 $[w.id] Deschedule $[w.id]
     + I Schedule $0 $[w.id] Deschedule -$[w.id]

     AddToFunc StartFunction
     + I Module FvwmAuto 1 -menter enter_handler

     DestroyFunc enter_handler
     AddToFunc enter_handler
     + I autohide FvwmButtons 250 500 S
     #            ^           ^   ^   ^
     #            |           |   |   |__  Shade direction (optional)
     #            |           |   |______  Hide delay
     #            |           |__________  Show delay
     #            |______________________  Unique window name/resource

  These functions work too in 2.5.8 to 2.5.10, but you may have
  to remove the KeepRc command from the autohide function in both
  versions.

#### Using application screenshots as icon or mini icon thumbnails.

  With a bit of scripting magic, fvwm can take a screenshot of an
  application window when it's iconified, resize it, and use it as
  the application's icon.  However, there are some applications that
  can do it on their own, which is the recommended method.

  With xterm, you can use the +ai (active icon) option on the command
  line:

     $ xterm +ai

  There is a live-icon elisp package for XEmacs.  Put this in your
  XEmacs configuration file:

     (load-library "live-icon")
     ; Control size, same as max icon size, uncomment if you want
     ; this feature.
     ;(setq live-icon-max-height 48)
     ;(setq live-icon-max-width 48)

  Make sure you are not using the style IconOverride for these
  applications.  It disables the use of active icons.  There may be
  other applications with similar features.

  Assuming you want application thumbnails as icons provided by fvwm,
  you need fvwm 2.5.8 or later, as this solution requires the
  WindowStyle command, and you should have the ImageMagick utilities
  available in your $PATH -- http://www.imagemagick.org.

  The function below provides a Replacement for the Iconify command
  called Thumbnail, which you can use in your bindings and raises
  each window, takes a screenshot and attempts to set the screenshot
  as the window's Icon.  Taking a screenshot may take a couple of
  seconds.  The window is iconified immediately, but the new
  thumbnail is activated when the screenshot is ready.

  Note that a screenshot can only be made reliably from the visible
  parts of a window.  So if the window is halfway off screen, on a
  different desk, or buried beneath other windows, the thumbnail may
  be smaller than expected or be empty in the hidden parts.  There is
  no way to prevent this.

  The same solution should work for mini icons.  Just replace the
  word "icon" with "miniicon" everywhere.

     DestroyFunc Thumbnail
     AddToFunc Thumbnail
     + I Raise
     + I ThisWindow (!Shaded, Iconifiable, !Iconic) PipeRead \
         "xwd -silent -id $[w.id] | convert -scale 64 -frame 1x1 \
         -mattecolor black -quality 0 xwd:- \
         png:$[FVWM_USERDIR]/icon.tmp.$[w.id].png \
         && echo WindowStyle IconOverride, \
         Icon $[FVWM_USERDIR]/icon.tmp.$[w.id].png \
         || echo Nop"
     + I Iconify

  You can use FvwmEvent to remove the Icons when each window is
  returned to its non Iconic state.

     DestroyFunc DeThumbnail
     AddToFunc DeThumbnail
     + I Exec rm -f $[FVWM_USERDIR]/icon.tmp.$[w.id].png
     + I DestroyWindowStyle

     *FvwmEvent: deiconify DeThumbnail

     AddToFunc StartFunction I Module FvwmEvent

  If you cannot use DestroyWindowStyle as you require it for some
  other purpose, you can save the window's current Icon, and restore
  it when required, this solution requires fvwm 2.5.9 or later.

  The Thumbnail function should look like this:

     DestroyFunc Thumbnail
     AddToFunc Thumbnail
     + I Raise
     + I SetEnv Icon-$[w.id] $[w.iconfile]
     + I ThisWindow (!Shaded, Iconifiable, !Iconic) PipeRead \
         "xwd -silent -id $[w.id] | convert -scale 64 -frame 1x1 \
         -mattecolor black -quality 0 xwd:- \
         png:$[FVWM_USERDIR]/icon.tmp.$[w.id].png \
         && echo WindowStyle IconOverride, \
         Icon $[FVWM_USERDIR]/icon.tmp.$[w.id].png \
         || echo Nop"
     + I Iconify

  And then the Icon is restored with this function:

     DestroyFunc DeThumbnail
     AddToFunc DeThumbnail
     + I PipeRead "echo WindowStyle Icon \\$\\[Icon-$[w.id]\\]"
     + I UnsetEnv Icon-$[w.id]
     + I Exec rm -f $[FVWM_USERDIR]/icon.tmp.$[w.id].png

  These Icons can also survive a Restart by adding this check to your
  StartFunction:

     AddToFunc StartFunction I Test (Restart) All (Iconic) \
       Test (f $[FVWM_USERDIR]/icon.tmp.$[w.id].png) WindowStyle \
       IconOverride, Icon $[FVWM_USERDIR]/icon.tmp.$[w.id].png

  You can also check for any remaining icons left behind and remove
  them in your ExitFunction:

     DestroyFunc ExitFunction
     AddToFunc ExitFunction I Test (!ToRestart) \
       Exec rm -f $[FVWM_USERDIR]/icon.tmp.*

  The same solution should work for mini icons.  Just replace the
  word "icon" with "miniicon" everywhere.

